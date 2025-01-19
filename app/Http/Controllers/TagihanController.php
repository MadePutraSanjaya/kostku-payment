<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Penghuni;
use App\Models\KamarKost;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with(['penghuni', 'kamar'])->get(); 
        return view('admin.tagihans.index', compact('tagihans')); 
    }

    public function create()
    {
        $penghunis = Penghuni::all(); 
        $kamars = KamarKost::all();  
        return view('admin.tagihans.form', [
            'editMode' => false,
            'tagihan' => null,
            'penghunis' => $penghunis,
            'kamars' => $kamars,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_penghuni' => 'required|exists:penghunis,id_penghuni',
            'id_kamar' => 'required|exists:kamar_kosts,id_kamar',
            'bulan_tagihan' => 'required|integer|min:1|max:12',
            'tahun_tagihan' => 'required|integer|min:2000',
            'total_tagihan' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|in:Belum Lunas,Lunas',
        ]);

        Tagihan::create($validated);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $penghunis = Penghuni::all(); 
        $kamars = KamarKost::all();  

        return view('admin.tagihans.form', [
            'editMode' => true,
            'tagihan' => $tagihan,
            'penghunis' => $penghunis,
            'kamars' => $kamars,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_penghuni' => 'required|exists:penghunis,id_penghuni',
            'id_kamar' => 'required|exists:kamar_kosts,id_kamar',
            'bulan_tagihan' => 'required|integer|min:1|max:12',
            'tahun_tagihan' => 'required|integer|min:2000',
            'total_tagihan' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|in:Belum Lunas,Lunas',
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update($validated);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus!');
    }
}
