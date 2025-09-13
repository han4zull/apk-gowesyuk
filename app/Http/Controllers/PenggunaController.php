<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penyewaan; 
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
       $pengguna = User::select(
            'users.id',
            'users.name',
            'users.email',
            'users.phone',
            'users.status',
            \DB::raw('COALESCE(COUNT(penyewaan.id_penyewaan), 0) as jumlah_penyewaan'),
            \DB::raw('COALESCE(SUM(penyewaan.total), 0) as total_pengeluaran')
        )
        ->leftJoin('penyewaan', 'users.id', '=', 'penyewaan.id_user')
        ->groupBy('users.id', 'users.name', 'users.email', 'users.phone', 'users.status')
        ->get();

        return view('admin.pengguna_sepeda', compact('pengguna'));
    }

    // Menampilkan detail pengguna
    public function show($id)
    {
        $pengguna = User::with(['penyewaan'])->findOrFail($id);
        return view('admin.pengguna_show', compact('pengguna'));
    }

    // Update status pengguna (aktif / nonaktif)
public function ubahStatus(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->status = $request->status;
    $user->save();

    return response()->json([
        'message' => 'Status berhasil diubah!',
        'status' => $user->status
    ]);
}


}
