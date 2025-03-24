<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardMemberController;

//*** route admin
use App\Http\Controllers\Admin\PeminjamanBukuController;
use App\Http\Controllers\Admin\BukuAdminController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PengembalianBukuController;

//*** route member
use App\Http\Controllers\Member\BukuMemberController;
use App\Http\Controllers\Member\PeminjamanBukuMemberController;
use App\Http\Controllers\Member\PengembalianBukuMemberController;

Route::get('/testing', function () {
    return view('testing');
});

// route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');

// route register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// route role [member, admin]
Route::group(['middleware' => 'auth:admin'], function() {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard.index');

    // route admin
    Route::get('admin/dashboard/member', [MemberController::class, 'member'])->name('admin.members.search');
    Route::get('admin/dashboard/buku', [BukuAdminController::class, 'buku'])->name('bukus.buku');
    Route::get('admin/dashboard/buku/{id}', [BukuAdminController::class, 'bukuDetail'])->name('buku.bukuDetail');
    Route::get('admin/dashboard/data-pinjam-buku', [PeminjamanBukuController::class, 'pinjamBuku'])->name('data-pinjam-buku.pinjamBuku');
    Route::get('admin/dashboard/data-kembalian-buku', [PengembalianBukuController::class, 'kembalianBuku'])->name('data-kembalian-buku.kembalianBuku');
});

Route::group(['middleware' => 'auth:member'], function() {
    Route::get('/member/dashboard', [DashboardMemberController::class, 'index'])->name('member.dashboard.index');

    // route member
    Route::get('member/dashboard/buku', [BukuMemberController::class, 'index'])->name('member.buku.index');
    Route::get('member/dashboard/buku/{id}', [BukuMemberController::class, 'bukuDetail'])->name('member.buku.bukuDetail');
    Route::get('member/dashboard/peminjaman-buku', [PeminjamanBukuMemberController::class, 'index'])->name('member.pinjam.index');
    Route::get('member/dashboard/pengembalian-buku', [PengembalianBukuMemberController::class, 'index'])->name('member.kembali.index');
});

// route logout [member, admin]
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
