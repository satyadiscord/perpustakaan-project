<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function buku(): View
    {
        return view('content.admin.buku');
    }
}
