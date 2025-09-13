<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'id_penyewaan',
        'id_user',
        'metode',
        'bank',
        'ewallet',
        'total',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true; // biar otomatis isi created_at & updated_at

    // Relasi ke penyewaan
    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'id_penyewaan');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
