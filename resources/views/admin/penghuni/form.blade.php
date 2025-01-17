@extends('welcome')

@section('title', isset($editMode) && $editMode ? 'Edit Penghuni' : 'Tambah Penghuni')
@section('header', isset($editMode) && $editMode ? 'Edit Penghuni' : 'Tambah Penghuni')

@section('content')
    <div class="container">
        <form action="{{ isset($editMode) && $editMode ? route('penghuni.update', $penghuni->id_penghuni) : route('penghuni.store') }}"
            method="POST" class="max-w-lg mx-auto p-4">
            @csrf
            @if (isset($editMode) && $editMode)
                @method('PUT')
            @endif
        

            <div class="mb-4">
                <label for="nama_penghuni" class="block mb-2">Nama Penghuni:</label>
                <input type="text" id="nama_penghuni" name="nama_penghuni"
                    class="form-control @error('nama_penghuni') is-invalid @enderror"
                    value="{{ old('nama_penghuni', $penghuni->nama_penghuni ?? '') }}" required>
                @error('nama_penghuni')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="no_telepon" class="block mb-2">No Telepon:</label>
                <input type="text" id="no_telepon" name="no_telepon"
                    class="form-control @error('no_telepon') is-invalid @enderror"
                    value="{{ old('no_telepon', $penghuni->no_telepon ?? '') }}" required>
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-2">Email:</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $penghuni->email ?? '') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ isset($editMode) && $editMode ? 'Update' : 'Simpan' }}
                </button>
                <a href="{{ route('penghuni.index') }}" class="btn btn-secondary ml-2">Kembali</a>
            </div>
        </form>
    </div>
@endsection
