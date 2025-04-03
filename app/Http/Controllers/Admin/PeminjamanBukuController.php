<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\PeminjamanBuku;
use App\Models\PengembalianBuku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamanBukuController extends Controller
{
    // route data pinjam buku
    public function pinjamBuku(): View
    {
        $pinjam = PeminjamanBuku::with(['buku', 'user'])->paginate(8);

        return view('content.admin.pinjam-buku', compact('pinjam'));
    }
}
