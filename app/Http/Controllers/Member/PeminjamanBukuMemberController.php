<?php

namespace App\Http\Controllers\Member;

use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PeminjamanBukuMemberController extends Controller
{
    //
    public function index(): View
    {

        // mendapatkan peminjaman buku berdasarkan user yang login saat ini!
        $peminjaman = PeminjamanBuku::where('user_id', Auth::id())->with('buku')->paginate(8);

        return view('content.member.pinjam-buku-member', compact('peminjaman'));
    }

    //?? get all data pinjam
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

        // melakukan pengecekan apakah user status nya sudah meminjam buku
        $existingLoan = PeminjamanBuku::where('user_id', Auth::id())->where('buku_id', $buku_id)->where('status', 'pinjam')->first();
        if ($existingLoan) {
            return redirect()->back()->with('error', 'Anda sudah meminjam buku ini. Kembalikan dulu sebelum meminjam lagi.');
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
            return redirect()->route('member.pinjam.index')->with('success', 'Buku berhasil dipinjam');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $err->getMessage());
        }
    }

    // public function pinjam(Request $request, $buku_id)
    // {
    //     $buku = Buku::findOrFail($buku_id);
    //     if ($buku->stok_buku <= 0) {
    //         return redirect()->back()->with('error', 'Buku tidak tersedia untuk dipinjam');
    //     }

    //     // Cek apakah user masih dalam masa denda
    //     $dendaExpire = session('denda_' . Auth::id());

    //     if ($dendaExpire && now()->lessThan($dendaExpire)) {
    //         return redirect()->back()->with('error', 'Anda masih dalam masa denda, coba lagi nanti.');
    //     }

    //     try {
    //         PeminjamanBuku::create([
    //             'user_id' => Auth::id(),
    //             'buku_id' => $buku->id,
    //             'tgl_peminjaman' => now(),
    //             'tgl_pengembalian' => now()->addDays(3),
    //             'status' => 'pinjam'
    //         ]);

    //         // Kurangi stok buku jika peminjaman berhasil
    //         $buku->decrement('stok_buku');
    //         return redirect()->route('member.pinjam.index')->with('success', 'Buku berhasil dipinjam');
    //     } catch (\Exception $err) {
    //         return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $err->getMessage());
    //     }
    // }
}
