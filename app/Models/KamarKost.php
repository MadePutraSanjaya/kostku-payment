<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarKost extends Model
{
    use HasFactory;

    protected $table = 'kamar_kosts';
    protected $primaryKey = 'id_kamar';
    protected $fillable = ['lokasi_kamar', 'fasilitas', 'status_kamar'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'id_kamar');
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class, 'id_kamar');
    }
}
