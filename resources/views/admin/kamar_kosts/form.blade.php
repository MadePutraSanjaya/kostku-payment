@extends('welcome')

@section('title', isset($editMode) && $editMode ? 'Edit Penghuni' : 'Tambah Penghuni')
@section('header', isset($editMode) && $editMode ? 'Edit Penghuni' : 'Tambah Penghuni')

@section('content')
<div class="container">
    <form action="{{ isset($editMode) && $editMode ? route('penghuni.update', $penghuni->id) : route('penghuni.store') }}" 
          method="POST" 
          class="max-w-lg mx-auto p-4">
        @csrf
        @if (isset($editMode) && $editMode) @method('PUT') @endif

        <div class="mb-4">
            <label for="nama_penghuni" class="block mb-2">Nama Penghuni:</label>
            <input type="text" 
                   id="nama_penghuni" 
                   name="nama_penghuni" 
                   class="form-control"
                   value="{{ old('nama_penghuni', $penghuni->nama_penghuni ?? '') }}" 
                   required>
        </div>

        <div class="mb-4">
            <label for="alamat_penghuni" class="block mb-2">Alamat Penghuni:</label>
            <textarea id="alamat_penghuni" 
                      name="alamat_penghuni" 
                      class="form-control" 
                      required>{{ old('alamat_penghuni', $penghuni->alamat_penghuni ?? '') }}</textarea>
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