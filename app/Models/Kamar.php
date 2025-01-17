<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $fillable = ['lokasi_kamar', 'harga_per_bulan', 'status_kamar'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'id_kamar');
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class, 'id_kamar');
    }
}
