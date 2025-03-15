<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardMemberController;
use Illuminate\Support\Facades\Route;

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
});

Route::group(['middleware' => 'auth:member'], function() {
    Route::get('/member/dashboard', [DashboardMemberController::class, 'index'])->name('member.dashboard.index');
});

// route logout [member, admin]
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
