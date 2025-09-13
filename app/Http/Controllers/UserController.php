<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function showFeaturedBikes()
{
    // Sepeda unggulan (featured bikes)
    $sepeda = DB::table('sepeda')
                ->whereIn('id', [1, 4, 7, 10, 13]) // ganti sesuai data featured
                ->get();


    // Trending bikes
    $trending = DB::table('sepeda')
                  ->whereIn('id', [19, 22, 25, 28]) // ganti sesuai data trending
                  ->get();

    // Kirim ke view
    return view('user.landing_page', [
        'sepeda' => $sepeda,
        'trending' => $trending
    ]);
}

public function getPenyewaan()
{
    $user = auth()->user();
    $penyewaan = \App\Models\Penyewaan::where('id_user', $user->id)->get();
    return response()->json($penyewaan);
}


}
