<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = ['user_id', 'sepeda_id'];

    public function sepeda()
    {
        return $this->belongsTo(Sepeda::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

?>