<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepeda extends Model
{
    use HasFactory;

    protected $table = 'sepeda';

    public $timestamps = false; // <-- tambahkan ini

    protected $fillable = [
        'nama_sepeda',
        'kode_sepeda',
        'jenis_sepeda',
        'kondisi',
        'harga_hari',
        'harga_jam',
        'deskripsi_sepeda',
        'ulasan',
        'tag_sepeda',
        'perawatan_terakhir',
        'stok',
        'gambar_sepeda',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
}
