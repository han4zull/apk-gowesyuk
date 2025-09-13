<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sepeda;

class LandingPageController extends Controller
{
    /**
     * Tampilkan halaman landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua sepeda untuk slider/featured
        $sepeda = Sepeda::all();

        // Ambil 5 sepeda terbaru untuk trending
        $trending = Sepeda::orderBy('created_at', 'desc')->take(5)->get();

        // Kirim data ke view landing_page
        return view('user.landing_page', compact('sepeda', 'trending'));
    }
}
