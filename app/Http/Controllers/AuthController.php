<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
{
    $request->validate([
        'full_name' => 'nullable|string|max:255', // sekarang optional
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone' => 'required|string',
        'password' => 'required|min:6',
    ]);

    User::create([
        'full_name' => $request->full_name, // kalau kosong, otomatis null
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'role' => 'user', // pastikan default role adalah user
    ]);

    return redirect()->route('auth.login')->with('success', 'Akun berhasil dibuat!');
}


    // Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.landing_page')->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
?>