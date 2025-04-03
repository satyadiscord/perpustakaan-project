<?php

namespace App\Http\Controllers\Member;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BukuMemberController extends Controller
{
    public function index(): View
    {
        $buku = Buku::with('kategori')->paginate(10);
        $kategoris = Kategori::all();

        return view('content.member.buku-member', compact(['buku', 'kategoris']));
    }

    // detail view
    public function bukuDetail($judul): View
    {
        // cari buku berdasarkan judul
        $judulBuku = Buku::where('judul', $judul)->firstOrFail();

        $buku = Buku::findOrFail($judulBuku->id);
        return view('content.member.buku-detail', compact('buku'));
    }

    public function filterByCategory($name): View
    {
        $kategoris = Kategori::all();

        // untuk mendapatkan url kategori/name(Pendidikan)
        if($name == 'Semua') {
            $buku = Buku::paginate(10);
        } else {
            $kategori = Kategori::where('name', $name)->firstOrFail();
            $buku = Buku::where('kategori_id', $kategori->id)->paginate(10);
        }

        return view('content.member.buku-member', compact('buku', 'kategoris'));
    }
}
