<?php

namespace App\Http\Controllers;

use App\Models\Sepeda;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function index()
    {
        // Ambil sepeda id 19,22,25,30
        $trending = Sepeda::whereIn('id', [19, 22, 25, 30])->get();

        // render ke landing_page
        return view('user.landing_page', compact('trending'));
    }
}
