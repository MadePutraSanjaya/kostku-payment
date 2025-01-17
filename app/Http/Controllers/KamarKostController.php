<?php
namespace App\Http\Controllers;

use App\Models\KamarKost;
use Illuminate\Http\Request;

class KamarKostController extends Controller
{
    public function index()
    {
        $kamar_kosts = KamarKost::all();
        return view('admin.kamar_kosts.index', compact('kamar_kosts'));
    }

    public function create()
    {
        return view('admin.kamar_kosts.form', [
            'editMode' => false,
            'kamar' => null
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi_kamar' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:20',
            'status_kamar' => 'required|string|max:20'
        ]);

        KamarKost::create($validated);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kamar = KamarKost::findOrFail($id);
        return view('admin.kamar_kosts.form', [
            'editMode' => true,
            'kamar' => $kamar
        ]);
    }

    public function update(Request $request, $id_kamar)
    {
        // Validasi input
        $validated = $request->validate([
            'lokasi_kamar' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'status_kamar' => 'required|in:Available,Occupied',
        ]);
    
        // Cari kamar berdasarkan ID
        $kamar = KamarKost::findOrFail($id_kamar);
    
        // Update data kamar
        $kamar->update($validated);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diupdate!');
    }
    

    public function destroy($id)
    {
        $post = KamarKost::findOrFail($id);

        $post->delete();

        return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
