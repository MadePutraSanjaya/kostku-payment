@extends('layouts.admin')

@section('title', $editMode ? 'Edit Kamar Kost' : 'Tambah Kamar Kost')
@section('header', $editMode ? 'Edit Kamar Kost' : 'Tambah Kamar Kost')

@section('content')
<form action="{{ $editMode ? route('kamar_kosts.update', $kamar->id_kamar) : route('kamar_kosts.store') }}" method="POST">
    @csrf
    @if ($editMode) @method('PUT') @endif

    <label for="lokasi_kamar">Lokasi Kamar:</label>
    <input type="text" id="lokasi_kamar" name="lokasi_kamar" 
           value="{{ old('lokasi_kamar', $kamar->lokasi_kamar ?? '') }}" required>

    <label for="harga_per_bulan">Harga Per Bulan:</label>
    <input type="number" id="harga_per_bulan" name="harga_per_bulan" 
           value="{{ old('harga_per_bulan', $kamar->harga_per_bulan ?? '') }}" required>

    <label for="status_kamar">Status Kamar:</label>
    <select id="status_kamar" name="status_kamar" required>
        <option value="Available" {{ old('status_kamar', $kamar->status_kamar ?? '') == 'Available' ? 'selected' : '' }}>Available</option>
        <option value="Occupied" {{ old('status_kamar', $kamar->status_kamar ?? '') == 'Occupied' ? 'selected' : '' }}>Occupied</option>
    </select>

    <button type="submit">{{ $editMode ? 'Update' : 'Simpan' }}</button>
</form>
@endsection
