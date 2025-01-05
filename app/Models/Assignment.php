<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments';
    protected $primaryKey = 'id_assignment';
    protected $fillable = ['id_penghuni', 'id_kamar', 'tanggal_mulai', 'tanggal_akhir'];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class, 'id_penghuni');
    }

    public function kamar()
    {
        return $this->belongsTo(KamarKost::class, 'id_kamar');
    }
}
