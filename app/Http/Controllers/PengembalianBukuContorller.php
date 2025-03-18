<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PengembalianBukuContorller extends Controller
{
    // route
    public function kembalianBuku(): View
    {
        return view('content.admin.kembalian-buku');
    }
}
