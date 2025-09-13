<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';
    protected $primaryKey = 'id_penyewaan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'id_sepeda',
        'nama_sepeda',
        'jenis_sepeda',
        'kode_sepeda',
        'harga_jam',
        'harga_hari',
        'durasi_jam',
        'durasi_hari',
        'biaya_admin',
        'total',
        'nama_lengkap',
        'alamat',
        'email',
        'nomor_telepon',
        'tanggal',
    ];

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_penyewaan');
    }

    // Relasi ke sepeda
    public function sepeda()
    {
        return $this->belongsTo(Sepeda::class, 'id_sepeda');
    }

    public $timestamps = false;
    


    // Relasi ke user (customer)
    public function customer()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Relasi ke laporan
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'penyewaan_id');
    }
}
