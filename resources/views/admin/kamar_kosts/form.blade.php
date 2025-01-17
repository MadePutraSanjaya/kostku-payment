@extends('welcome')

@section('title', isset($editMode) && $editMode ? 'Edit Kamar' : 'Tambah Kamar')
@section('header', isset($editMode) && $editMode ? 'Edit Kamar' : 'Tambah Kamar')

@section('content')
    <div class="container">
        <form action="{{ isset($editMode) && $editMode ? route('kamar.update', $kamar->id_kamar) : route('kamar.store') }}"
            method="POST" class="max-w-lg mx-auto p-4">
            @csrf
            @if (isset($editMode) && $editMode)
                @method('PUT')
            @endif
        

            <div class="mb-4">
                <label for="lokasi_kamar" class="block mb-2">Lokasi Kamar</label>
                <input type="text" id="lokasi_kamar" name="lokasi_kamar"
                    class="form-control @error('lokasi_kamar') is-invalid @enderror"
                    value="{{ old('lokasi_kamar', $kamar->lokasi_kamar ?? '') }}" required>
                @error('lokasi_kamar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fasilitas" class="block mb-2">Fasilitas:</label>
                <textarea id="fasilitas" name="fasilitas" 
                    class="form-control @error('fasilitas') is-invalid @enderror"
                    required>{{ old('fasilitas', $kamar->fasilitas ?? '') }}</textarea>
                @error('fasilitas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="mb-4">
                <label for="status_kamar" class="block mb-2">Status Kamar:</label>
                <select id="status_kamar" name="status_kamar" 
                    class="form-control @error('status_kamar') is-invalid @enderror">
                    <option value="">-- Pilih Status Kamar --</option>
                    <option value="Available" 
                        {{ old('status_kamar', $kamar->status_kamar ?? '') === 'Available' ? 'selected' : '' }}>
                        Available
                    </option>
                    <option value="Occupied" 
                        {{ old('status_kamar', $kamar->status_kamar ?? '') === 'Occupied' ? 'selected' : '' }}>
                        Occupied
                    </option>
                </select>
                @error('status_kamar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ isset($editMode) && $editMode ? 'Update' : 'Simpan' }}
                </button>
                <a href="{{ route('kamar.index') }}" class="btn btn-secondary ml-2">Kembali</a>
            </div>
        </form>
    </div>
@endsection
