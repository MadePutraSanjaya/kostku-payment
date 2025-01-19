<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class Riwayat extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::where('status_pembayaran', 'Lunas')->get();

        return view('admin.riwayat.index', compact('tagihans'));
    }
    
}
