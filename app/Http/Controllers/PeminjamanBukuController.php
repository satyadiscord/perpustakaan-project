<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;
use App\Models\PengembalianBuku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PeminjamanBukuController extends Controller
{
    // route data pinjam buku
    public function pinjamBuku(): View
    {
        return view('content.admin.pinjam-buku');
    }

    public function pinjam($buku_id)
    {
        $buku = Buku::findOrFail($buku_id);
        if ($buku->stok_buku <= 0) {
            return redirect()->back()->with('error', 'Buku tidak tersedia untuk dipinjam');
        }

        // Cek apakah user masih dalam masa denda
        $dendaExpire = session('denda_' . Auth::id());

        if ($dendaExpire && now()->lessThan($dendaExpire)) {
            return redirect()->back()->with('error', 'Anda masih dalam masa denda, coba lagi nanti.');
        }

        try {
            PeminjamanBuku::create([
                'user_id' => Auth::id(),
                'buku_id' => $buku->id,
                'tgl_peminjaman' => now(),
                'tgl_pengembalian' => now()->addDays(3),
                'status' => 'pinjam'
            ]);

            // Kurangi stok buku jika peminjaman berhasil
            $buku->decrement('stok_buku');
            return redirect()->route('testing')->with('success', 'Buku berhasil dipinjam');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $err->getMessage());
        }
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

        // ✅ Simpan data pengembalian ke database
        PengembalianBuku::create([
            'peminjaman_id' => $peminjaman->id,
            'tgl_pengembalian' => $now,
            'denda' => $denda,
        ]);

        // ✅ UPDATE STATUS PINJAMAN & KEMBALIKAN STOK
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
