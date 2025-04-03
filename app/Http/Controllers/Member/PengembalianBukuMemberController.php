<?php

namespace App\Http\Controllers\Member;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;
use App\Models\PengembalianBuku;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengembalianBukuMemberController extends Controller
{
    //
    public function index(): View
    {
        $pengembalian = PengembalianBuku::whereHas('peminjaman', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('peminjaman.buku')->paginate(8);

        return view('content.member.kembali-buku-member', compact('pengembalian'));
    }

    public function kembalikan($peminjaman_id)
    {
        $peminjaman = PeminjamanBuku::findOrFail($peminjaman_id);
        $buku = Buku::findOrFail($peminjaman->buku_id);

        // Pengecekan apakah telat pengembalian
        $now = now();
        $tgl_seharusnya_kembali = Carbon::parse($peminjaman->tgl_pengembalian);
        $denda = 0;

        if ($now->greaterThan($tgl_seharusnya_kembali)) {
            $telatMenit = $now->diffInMinutes($tgl_seharusnya_kembali);
            $denda = 60; // Denda default 60 (asumsi per jam)
        }

        // Simpan data pengembalian ke database
        PengembalianBuku::create([
            'peminjaman_id' => $peminjaman->id,
            'tgl_pengembalian' => $now,
            'denda' => $denda,
        ]);

        // MENGUPDATE STATUS PINJAMAN & KEMBALIKAN STOK
        $peminjaman->update(['status' => 'kembali']);
        $buku->increment('stok_buku');

        // Jika ada denda, simpan ke session & tampilkan notifikasi
        if ($denda > 0) {
            session(['denda_' . Auth::id() => $now->addMinutes(60)]);
            return redirect()->back()->with('error', 'Anda terkena denda, tidak bisa meminjam selama 1 jam.');
        }

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }
}
