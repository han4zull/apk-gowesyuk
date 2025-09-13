<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Penyewaan;
use Barryvdh\DomPDF\Facade\Pdf; // <-- Import PDF facade

class LaporanController extends Controller
{
    /**
     * Menampilkan daftar laporan customer
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $laporans = Laporan::with('penyewaan') // relasi penyewaan
            ->when($search, function ($query, $search) {
                return $query->whereHas('penyewaan', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('nomor_telepon', 'like', "%$search%")
                      ->orWhere('nama_sepeda', 'like', "%$search%")
                      ->orWhere('kode_sepeda', 'like', "%$search%")
                      ->orWhere('tanggal', 'like', "%$search%");
                })->orWhere('judul', 'like', "%$search%")
                  ->orWhere('kategori', 'like', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.laporan', compact('laporans', 'search'));
    }

        public function updateStatus(Request $request, $id)
{
    $laporan = Laporan::findOrFail($id);

    // nilai status datang dari form (sedang_ditangani / selesai)
    $laporan->status = $request->status;
    $laporan->save();

    return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
}


    /**
     * Menampilkan detail laporan
     */
    public function show($id)
    {
        $laporan = Laporan::with('penyewaan')->findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }

    /**
     * Export laporan ke PDF
     */
    public function export()
    {
        $laporans = Laporan::with('penyewaan')->orderBy('created_at', 'desc')->get();

        $pdf = Pdf::loadView('admin.laporan_pdf', compact('laporans')); // gunakan view khusus PDF
        return $pdf->download('laporan_customer.pdf');
    }
}
