<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\PeminjamanBuku;
use App\Models\PengembalianBuku;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    //view /admin/dashboard
    public function index(): View
    {
        return view('content.admin.dashboard-admin', [
            'totalMember' => User::where('role', 'member')->count(), // ini yang dihitung total member saja kecuali admin tidak dihitung
            'totalBuku' => Buku::count(),
            'totalPeminjaman' => PeminjamanBuku::count(),
            'totalPengembalian' => PengembalianBuku::count(),
        ]);
    }
}
