<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserAuthVerifyRequest;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        Session::flash('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->route('login');
    }


    public function verify(UserAuthVerifyRequest $request): RedirectResponse
    {
        // dd($request->validated());
        $data = $request->validated();

        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => 'admin'])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } else if (Auth::guard('member')->attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => 'member'])) {
            $request->session()->regenerate();
            return redirect()->intended('/member/dashboard');
        } else {
            return redirect(route('login'))->with('msg', 'email and password are incorrect!');
        }
    }

    public function logout(): RedirectResponse
    {
        if(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if(Auth::guard('member')->check()) {
            Auth::guard('member')->logout();
        }

        return redirect(route('login'));
    }
}
