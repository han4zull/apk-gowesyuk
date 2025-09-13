<?php
namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function store(Request $request, $id_penyewaan)
    {
        $validated = $request->validate([
            'metode' => 'required|string',
            'bank'   => 'nullable|string',
            'ewallet'=> 'nullable|string',
            'total'  => 'required|numeric',
        ]);

        $penyewaan = Penyewaan::findOrFail($id_penyewaan);

        $pembayaran = Pembayaran::create([
            'id_penyewaan' => $penyewaan->id,
            'id_user'      => auth()->id(),
            'metode'       => $validated['metode'],
            'bank'         => $validated['bank'],
            'ewallet'      => $validated['ewallet'],
            'total'        => $validated['total'],
        ]);

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    }
}
