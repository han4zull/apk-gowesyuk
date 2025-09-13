<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $items = Keranjang::where('user_id', Auth::id())->with('sepeda')->get();
        return view('user.keranjang', ['keranjang' => $items]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sepeda_id' => 'required|exists:sepeda,id',
        ]);

        Keranjang::firstOrCreate([
            'user_id' => Auth::id(),
            'sepeda_id' => $request->sepeda_id,
        ]);

        return back()->with('success', 'Sepeda ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        Keranjang::where('user_id', Auth::id())->where('id', $id)->delete();
        return back()->with('success', 'Sepeda dihapus dari keranjang!');
    }
}
