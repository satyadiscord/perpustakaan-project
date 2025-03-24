<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BukuAdminController extends Controller
{
    public function buku(): View
    {
        $bukus = Buku::with('kategori')->get();

        return view('content.admin.buku', compact('bukus'));
    }

    // detail view
    public function bukuDetail($id): View
    {
        // cari buku berdasarkan id
        $buku = Buku::findOrFail($id);
        return view('content.admin.detail-buku', compact('buku'));
    }
}
