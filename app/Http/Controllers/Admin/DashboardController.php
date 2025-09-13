<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sepeda;
use App\Models\User;
use App\Models\Penyewaan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSepeda   = Sepeda::count();
        $sepedaDisewa  = Penyewaan::where('status', 'proses')->count();
        $penggunaAktif = User::where('status', 'aktif')->count();
        $pendapatan    = Penyewaan::sum('total');

        $tersedia   = Sepeda::count() - $sepedaDisewa;
        $maintenance = Sepeda::where('kondisi', 'maintenance')->count();
        $rusak      = Sepeda::where('kondisi', 'rusak')->count();

        $latestRent = Penyewaan::with(['customer', 'sepeda'])
                        ->latest()
                        ->take(5)
                        ->get();

        return view('admin.beranda_admin', compact(
            'totalSepeda',
            'sepedaDisewa',
            'penggunaAktif',
            'pendapatan',
            'tersedia',
            'maintenance',
            'rusak',
            'latestRent'
        ));
    }
}
