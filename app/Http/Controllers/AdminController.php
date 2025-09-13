<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sepeda;
use App\Models\Penyewaan;

class AdminController extends Controller
{
    // Beranda admin
    public function index()
    {
        // Hitung jumlah sepeda berdasarkan status
        $tersedia     = Sepeda::where('kondisi', 'tersedia')->count();
        $sepedaDisewa = Sepeda::where('kondisi', 'disewa')->count();
        $maintenance  = Sepeda::where('kondisi', 'maintenance')->count();
        $rusak        = Sepeda::where('kondisi', 'rusak')->count();

        // Total
        $totalSepeda = $tersedia + $sepedaDisewa + $maintenance + $rusak;

        // Hitung persentase
        $persenTersedia    = $totalSepeda > 0 ? ($tersedia / $totalSepeda) * 100 : 0;
        $persenDisewa      = $totalSepeda > 0 ? ($sepedaDisewa / $totalSepeda) * 100 : 0;
        $persenMaintenance = $totalSepeda > 0 ? ($maintenance / $totalSepeda) * 100 : 0;
        $persenRusak       = $totalSepeda > 0 ? ($rusak / $totalSepeda) * 100 : 0;

        return view('admin.beranda_admin', compact(
            'tersedia',
            'sepedaDisewa',
            'maintenance',
            'rusak',
            'totalSepeda',
            'persenTersedia',
            'persenDisewa',
            'persenMaintenance',
            'persenRusak'
        ));
    }

    // Kelola sepeda
    public function kelolaSepeda()
    {
        $sepeda = Sepeda::all();
        return view('admin.kelola_sepeda', compact('sepeda'));
    }

    // Kelola pengguna
    public function kelolaPengguna()
    {
        $users = User::all();
        return view('admin.pengguna_sepeda', compact('users'));
    }
}
