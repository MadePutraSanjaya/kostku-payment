<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::all();
        return view('admin.penghuni.index', compact('penghuni'));
    }

    public function create()
    {
        return view('admin.penghuni.form', [
            'editMode' => false,
            'penghuni' => null
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penghuni' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email' => 'nullable|email|unique:penghunis,email'
        ]);

        Penghuni::create($validated);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        return view('admin.penghuni.form', [
            'editMode' => true,
            'penghuni' => $penghuni
        ]);
    }

    public function update(Request $request, Penghuni $penghuni)
    {
        $validated = $request->validate([
            'nama_penghuni' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email' => 'nullable|email'
        ]);
    
       
        $penghuni->update($validated);
    
        // Debug setelah update
        dd('Setelah Update', $penghuni);
    
        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil diperbarui!');
    
    }


    public function destroy(Penghuni $penghuni)
    {
        $penghuni->delete();

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil dihapus!');
    }
}
