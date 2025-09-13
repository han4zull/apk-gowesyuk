<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepeda;
use Illuminate\Validation\Rule; // <--- penting buat validasi unique ignore

class SepedaController extends Controller
{
    public function index()
    {
        $sepeda = Sepeda::all();
        return view('user.sewa_sepeda', compact('sepeda'));
    }

    // detail sepeda
    public function detail($id)
    {
        $sepeda = Sepeda::findOrFail($id); 
        return view('user.detail_produk', compact('sepeda'));
    }

    public function show($id)
    {
        $sepeda = Sepeda::findOrFail($id);
        return view('user.detail_produk', compact('sepeda'));
    }

    // kelola (admin)
    public function kelola()
    {
        $sepeda = Sepeda::all();
        return view('admin.kelola_sepeda', compact('sepeda'));
    }

    // simpan sepeda baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_sepeda'        => 'required|string|max:255',
            'kode_sepeda'        => 'required|string|unique:sepeda',
            'jenis_sepeda'       => 'required|string',
            'kondisi'            => 'required|string|in:tersedia,disewa,perawatan,rusak',
            'harga_hari'         => 'required|numeric|min:0',
            'harga_jam'          => 'required|numeric|min:0',
            'deskripsi_sepeda'   => 'nullable|string',
            'ulasan'             => 'nullable|string',
            'tag_sepeda'         => 'nullable|string',
            'perawatan_terakhir' => 'nullable|date',
            'stok'               => 'nullable|integer|min:0',
            'gambar_sepeda'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // upload gambar ke storage/app/public/sepeda
        if ($request->hasFile('gambar_sepeda')) {
            $file = $request->file('gambar_sepeda');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/sepeda', $filename);
            $data['gambar_sepeda'] = $filename;
        }

        // default stok = 0 kalau tidak ada input
        if (!isset($data['stok'])) {
            $data['stok'] = 0;
        }

        Sepeda::create($data);

        return redirect()->route('admin.kelola_sepeda')->with('success', 'Sepeda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sepeda = Sepeda::findOrFail($id);
        return view('admin.edit_sepeda', compact('sepeda'));
    }

    public function update(Request $request, $id)
    {
        $sepeda = Sepeda::findOrFail($id);

        $data = $request->validate([
            'nama_sepeda'        => 'required|string|max:255',
            'kode_sepeda'        => [
                'required',
                'string',
                Rule::unique('sepeda', 'kode_sepeda')->ignore($sepeda->id),
            ],
            'jenis_sepeda'       => 'required|string',
            'kondisi'            => 'required|string|in:tersedia,disewa,perawatan,rusak',
            'harga_hari'         => 'required|numeric|min:0',
            'harga_jam'          => 'required|numeric|min:0',
            'deskripsi_sepeda'   => 'nullable|string',
            'ulasan'             => 'nullable|string',
            'tag_sepeda'         => 'nullable|string',
            'perawatan_terakhir' => 'nullable|date',
            'stok'               => 'nullable|integer|min:0',
            'gambar_sepeda'      => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // handle gambar baru
        if ($request->hasFile('gambar_sepeda')) {
            $file = $request->file('gambar_sepeda');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/sepeda', $filename);
            $data['gambar_sepeda'] = $filename;
        }

        $sepeda->update($data);

        return redirect()->route('admin.kelola_sepeda')->with('success', 'Sepeda berhasil diupdate!');
    }

    public function destroy($id)
    {
        $sepeda = Sepeda::findOrFail($id);
        $sepeda->delete();
        return redirect()->route('admin.kelola_sepeda')->with('success', 'Sepeda berhasil dihapus!');
    }

    public function sewaForm($id)
    {
        $sepeda = Sepeda::findOrFail($id); // objek tunggal
        return view('user.form_sewa', compact('sepeda'));
    }
}
