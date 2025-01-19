<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::where('status_pembayaran', 'Belum Lunas')->get();

        return view('admin.pembayarans.index', compact('tagihans'));
    }
    

    // Memproses pembayaran tagihan
    public function update($id)
    {
              // Ambil tagihan berdasarkan ID
              $tagihan = Tagihan::findOrFail($id);

              // Update status tagihan menjadi 'sudah_dibayar'
              $tagihan->update(['status_pembayaran' => 'Lunas']);
      
              return redirect()->route('pembayaran.index')->with('success', 'Tagihan berhasil dibayar.');
      
    }
}
