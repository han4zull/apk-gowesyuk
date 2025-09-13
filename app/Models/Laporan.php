<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'penyewaan_id',
    'nama_lengkap',
    'email',
    'nomor_telepon',
    'nama_sepeda',
    'kode_sepeda',
    'tanggal',
    'judul',
    'kategori',
    'deskripsi_masalah',
    'rating',
    'status',
];


    // Relasi ke user (customer)
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke penyewaan (untuk data sepeda & customer info)
    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'penyewaan_id');
    }
}
