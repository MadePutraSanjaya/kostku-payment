<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghuni = Penghuni::all();
        return view('admin.penghuni.index', compact('penghuni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penghuni.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penghuni' => 'required|string|max:255',
            'alamat_penghuni' => 'required|string',
        ]);

        Penghuni::create($validated);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penghuni $penghuni)
    {
        return view('penghuni.show', compact('penghuni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghuni $penghuni)
    {
        return view('penghuni.form', compact('penghuni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penghuni $penghuni)
    {
        $validated = $request->validate([
            'nama_penghuni' => 'required|string|max:255',
            'alamat_penghuni' => 'required|string',
        ]);

        $penghuni->update($validated);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghuni $penghuni)
    {
        $penghuni->delete();

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil dihapus!');
    }
}
