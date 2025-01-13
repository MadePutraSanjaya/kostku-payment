@extends('layouts.admin')

@section('title', $editMode ? 'Edit Penghuni' : 'Tambah Penghuni')
@section('header', $editMode ? 'Edit Penghuni' : 'Tambah Penghuni')

@section('content')
<form action="{{ $editMode ? route('penghuni.update', $penghuni->id_penghuni) : route('penghuni.store') }}" method="POST">
    @csrf
    @if ($editMode) @method('PUT') @endif
    <label>Nama:</label>
    <input type="text" name="nama_penghuni" value="{{ old('nama_penghuni', $penghuni->nama_penghuni ?? '') }}" required>
    <label>Alamat:</label>
    <textarea name="alamat_penghuni" required>{{ old('alamat_penghuni', $penghuni->alamat_penghuni ?? '') }}</textarea>
    <button type="submit">{{ $editMode ? 'Update' : 'Simpan' }}</button>
</form>
@endsection
