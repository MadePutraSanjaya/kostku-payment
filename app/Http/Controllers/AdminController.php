<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
use App\Models\KamarKost;
use App\Models\Tagihan;
use App\Models\Pembayaran;

class AdminController extends Controller
{
    // Manage Kamar Kost
    public function manageKamar()
    {
        $kamar = KamarKost::all();
        return view('admin.manage_kamar', compact('kamar'));
    }

    // Manage Penghuni
    public function managePenghuni()
    {
        $penghuni = Penghuni::all();
        return view('admin.manage_penghuni', compact('penghuni'));
    }

    // Assign Penghuni ke Kamar
    public function assignKamar()
    {
        $kamarAvailable = KamarKost::where('status_kamar', 'Available')->get();
        $penghuni = Penghuni::all();
        return view('admin.assign_kamar', compact('kamarAvailable', 'penghuni'));
    }

    public function storeAssignKamar(Request $request)
    {
        $request->validate([
            'id_penghuni' => 'required|exists:penghunis,id_penghuni',
            'id_kamar' => 'required|exists:kamar_kosts,id_kamar',
        ]);

        // Logic for assigning penghuni to kamar
        $kamar = KamarKost::findOrFail($request->id_kamar);
        $kamar->status_kamar = 'Occupied';
        $kamar->save();

        // Save assignment
        $kamar->assignments()->create([
            'id_penghuni' => $request->id_penghuni,
            'tanggal_mulai' => now(),
        ]);

        return redirect()->back()->with('success', 'Penghuni berhasil ditugaskan ke kamar.');
    }

    // Posting Tagihan
    public function postingTagihan()
    {
        $penghuni = Penghuni::all();
        return view('admin.posting_tagihan', compact('penghuni'));
    }

    // Laporan Pembayaran
    public function laporanPembayaran()
    {
        $pembayaran = Pembayaran::with('tagihan')->get();
        return view('admin.laporan_pembayaran', compact('pembayaran'));
    }
}
