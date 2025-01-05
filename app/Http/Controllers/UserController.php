<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Pembayaran;

class UserController extends Controller
{
    // Melihat Riwayat Pembayaran
    public function riwayatPembayaran($id_penghuni)
    {
        $pembayaran = Pembayaran::whereHas('tagihan', function ($query) use ($id_penghuni) {
            $query->where('id_penghuni', $id_penghuni);
        })->get();

        return view('user.riwayat_pembayaran', compact('pembayaran'));
    }

    // Melihat Tagihan yang Belum Dibayar
    public function tagihanBelumBayar($id_penghuni)
    {
        $tagihan = Tagihan::where('id_penghuni', $id_penghuni)
            ->where('status_pembayaran', 'Belum Lunas')
            ->get();

        return view('user.tagihan_belum_bayar', compact('tagihan'));
    }
}
