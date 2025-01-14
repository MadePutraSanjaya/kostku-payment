<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    protected $table = 'penghunis';
    protected $primaryKey = 'id_penghuni';
    protected $fillable = [
        'nama_penghuni',
        'no_telepon',
        'email'
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'id_penghuni');
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class, 'id_penghuni');
    }
}
