<?php
namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Sepeda;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // ✅ untuk export PDF

class PenyewaanController extends Controller
{
    // =============================
    // Admin: Kelola penyewaan + search
    // =============================
    public function kelolaPenyewaan(Request $request)
    {
        $search = $request->input('search');

        $penyewaan = Penyewaan::with('customer', 'sepeda')
            ->when($search, function ($query, $search) {
                $query->where('id_penyewaan', 'like', "%$search%")
                      ->orWhere('nama_sepeda', 'like', "%$search%")
                      ->orWhereHas('customer', function($q) use ($search) {
                          $q->where('name', 'like', "%$search%")
                            ->orWhere('phone', 'like', "%$search%");
                      });
            })
            ->latest()
            ->get();

        return view('admin.penyewaan_sepeda', compact('penyewaan', 'search'));
    }

    // =============================
    // Admin: Export ke PDF
    // =============================
    
    public function export()
    {
        $penyewaan = Penyewaan::with('customer', 'sepeda')
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = Pdf::loadView('admin.penyewaan_pdf', compact('penyewaan'));
        return $pdf->download('penyewaan.pdf');
    }

    // =============================
    // Store penyewaan baru (user)
    // =============================
    public function store(Request $request, $sepeda_id)
{
    $validated = $request->validate([
        'tanggal'       => 'required|date|after_or_equal:today',
        'durasi_jam'    => 'nullable|integer',
        'durasi_hari'   => 'nullable|integer',
        'nama_lengkap'  => 'required',
        'alamat'        => 'required',
        'email'         => 'required|email',
        'nomor_telepon' => 'required',
        'metode'        => 'required|string',   // bank | cod | ewallet
        'bank'          => 'nullable|string',
        'ewallet'       => 'nullable|string',   // dana | ovo | gopay | qris
    ]);

    $sepeda = Sepeda::findOrFail($sepeda_id);

    // Cek stok
    $stokTerpakai = Penyewaan::where('id_sepeda', $sepeda->id)
                    ->where('status', 'proses')
                    ->count();

    $stokSekarang = $sepeda->stok - $stokTerpakai;
    if ($stokSekarang <= 0) {
        return response()->json([
            'success' => false,
            'message' => 'Sepeda sudah habis disewa!'
        ]);
    }

    // Hitung biaya
    $durasi_jam  = $request->durasi_jam ?? 0;
    $durasi_hari = $request->durasi_hari ?? 0;
    $total = ($durasi_jam * $sepeda->harga_jam) + ($durasi_hari * $sepeda->harga_hari) + 3000;

    // Generate VA jika metode bank atau ewallet (bukan QRIS)
    $vaNumber = null;
if ($request->metode === 'bank') {
    $vaNumber = $this->generateVA($request->bank);
} elseif ($request->metode === 'ewallet' && $request->ewallet !== 'qris') {
    $vaNumber = $this->generateVA($request->ewallet);
}


    // Buat penyewaan
    $penyewaan = Penyewaan::create([
        'id_user'      => auth()->id(),
        'id_sepeda'    => $sepeda->id,
        'nama_sepeda'  => $sepeda->nama_sepeda,
        'jenis_sepeda' => $sepeda->jenis_sepeda,
        'kode_sepeda'  => $sepeda->kode_sepeda,
        'harga_jam'    => $durasi_jam * $sepeda->harga_jam,
        'harga_hari'   => $durasi_hari * $sepeda->harga_hari,
        'durasi_jam'   => $durasi_jam,
        'durasi_hari'  => $durasi_hari,
        'biaya_admin'  => 3000,
        'total'        => $total,
        'nama_lengkap' => $request->nama_lengkap,
        'alamat'       => $request->alamat,
        'email'        => $request->email,
        'nomor_telepon'=> $request->nomor_telepon,
        'tanggal'      => $request->tanggal,
        'status'       => 'proses',
        'metode'       => $request->metode,
        'bank'         => $request->metode === 'bank' ? $request->bank : null,
        'ewallet'      => $request->metode === 'ewallet' ? $request->ewallet : null,
    ]);

    // Buat pembayaran
    Pembayaran::create([
        'id_penyewaan' => $penyewaan->id,
        'metode'       => $request->metode,
        'status'       => 'proses',
        'total'        => $total,
        'bank'         => $request->metode === 'bank' ? $request->bank : null,
        'ewallet'      => $request->metode === 'ewallet' ? $request->ewallet : null,
        'va_number'    => $vaNumber,
    ]);

    // Response
    $response = [
        'success'  => true,
        'order_id' => $penyewaan->id_penyewaan,
        'metode'   => $request->metode,
        'bank'     => $request->bank ?? null,
        'ewallet'  => $request->ewallet ?? null,
        'total'    => $total,
    ];

    if ($vaNumber) {
        $response['va_number'] = $vaNumber;
    }

    if ($request->metode === 'ewallet' && $request->ewallet === 'qris') {
        $response['qris_link'] = asset('images/QRIS.jpg');
    }

    if ($request->metode === 'cod') {
        $response['message'] = 'Pesanan COD berhasil dibuat.';
    }

    return response()->json($response);
}

// Fungsi generate VA unik per bank
private function generateVA($bank)
{
    $prefixes = [
        'bca'    => '88',
        'bni'    => '89',
        'mandiri'=> '90',
        'bri'    => '91',
        'dana'   => '92',
        'ovo'    => '93',
        'gopay'  => '94',
    ];

    $prefix = $prefixes[strtolower($bank)] ?? '95'; // default jika bank/ewallet baru

    do {
        $number = $prefix . rand(1000000000, 9999999999); // 10 digit unik
    } while (Pembayaran::where('va_number', $number)->exists());

    return $number;
}



    // =============================
    // User selesai / batal
    // =============================
    public function selesai($id)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        if ($penyewaan->id_user !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        if ($penyewaan->status === 'proses') {
            $penyewaan->status = 'selesai';
            $penyewaan->save();
        }

        return redirect()->back()->with('success', 'Penyewaan berhasil diselesaikan.');
    }

    public function batal($id)
    {
        $penyewaan = Penyewaan::where('id_penyewaan', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        if ($penyewaan->status === 'proses') {
            $penyewaan->status = 'batal';
            $penyewaan->save();
        }

        return redirect()->back()->with('success', 'Pesanan telah dibatalkan.');
    }

    // =============================
    // Admin selesai / batal
    // =============================
    public function adminSelesai($id)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        if ($penyewaan->status === 'proses') {
            $penyewaan->status = 'selesai';
            $penyewaan->save();
        }

        return redirect()->back()->with('success', 'Penyewaan berhasil diselesaikan oleh admin.');
    }

    public function adminBatal($id)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        if ($penyewaan->status === 'proses') {
            $penyewaan->status = 'batal';
            $penyewaan->save();
        }

        return redirect()->back()->with('success', 'Penyewaan berhasil dibatalkan oleh admin.');
    }

    // =============================
    // User: Daftar sepeda
    // =============================
    public function index()
    {
        $sepeda = Sepeda::all();
        return view('user.sewa_sepeda', compact('sepeda'));
    }
}
