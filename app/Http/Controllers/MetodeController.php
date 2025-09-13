<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodeController extends Controller
{
    // Contoh method index
    public function index()
    {
        // Tampilkan halaman metode pembayaran atau data terkait
        return view('user.metode');
    }
    // Tambahkan method lain sesuai kebutuhan
}
