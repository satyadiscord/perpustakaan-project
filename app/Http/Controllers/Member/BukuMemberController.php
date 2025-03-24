<?php

namespace App\Http\Controllers\Member;

use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuMemberController extends Controller
{
    //
    public function index(): View
    {
        $buku = Buku::with('kategori')->get();
        return view('content.member.buku-member', compact('buku'));
    }

    // detail view
    public function bukuDetail($id): View
    {
        // cari buku berdasarkan id
        $buku = Buku::findOrFail($id);
        return view('content.member.buku-detail', compact('buku'));
    }
}
