<?php

namespace App\Http\Controllers\Admin;

use App\Models\PengembalianBuku;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengembalianBukuController extends Controller
{
    public function kembalianBuku(): View
    {
        $kembali = PengembalianBuku::with(['peminjaman'])->get();

        return view('content.admin.kembalian-buku', compact('kembali'));
    }
}
