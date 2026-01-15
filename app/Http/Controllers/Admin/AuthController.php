<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // tampilkan form login
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required', // bisa username atau email
            'password' => 'required',
        ]);

        $loginType = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        if (Auth::attempt([
            $loginType => $credentials['login'],
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'login' => 'Username / Email atau password salah',
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
