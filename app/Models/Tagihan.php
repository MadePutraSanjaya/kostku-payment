<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihans';
    protected $primaryKey = 'id_tagihan';
    protected $fillable = ['id_penghuni', 'id_kamar', 'bulan_tagihan', 'tahun_tagihan', 'total_tagihan', 'status_pembayaran'];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class, 'id_penghuni');
    }

    public function kamar()
    {
        return $this->belongsTo(KamarKost::class, 'id_kamar');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'id_tagihan');
    }
}
