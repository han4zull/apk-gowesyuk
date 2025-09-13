<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Method untuk login
    public function login(Request $request)
    {
        // validasi input email & password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            
            $userRole = Auth::user()->role;

        if ($userRole === 'admin') {
             return redirect()->route('admin.beranda_admin');
            } else {
             return redirect()->route('user.landing_page');
    }

        }

        // kalau login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        Auth::logout();                     // logout user
        $request->session()->invalidate();  // hapus session
        $request->session()->regenerateToken(); // regenerate CSRF token

        return redirect('landing_page'); // redirect ke landing page
    }
}
