@extends('welcome')

@section('title', $editMode ? 'Edit Tagihan' : 'Posting Tagihan')
@section('header', $editMode ? 'Edit Tagihan' : 'Posting Tagihan')

@section('content')
    <div class="container">
        <form action="{{ $editMode ? route('tagihan.update', $tagihan->id_tagihan) : route('tagihan.store') }}"
            method="POST" class="max-w-lg mx-auto p-4">
            @csrf
            @if ($editMode)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="id_penghuni" class="block mb-2">Penghuni:</label>
                <select name="id_penghuni" id="id_penghuni"
                    class="form-control @error('id_penghuni') is-invalid @enderror" required>
                    <option value="">-- Pilih Penghuni --</option>
                    @foreach ($penghunis as $penghuni)
                        <option value="{{ $penghuni->id_penghuni }}"
                            {{ old('id_penghuni', $tagihan->id_penghuni ?? '') == $penghuni->id_penghuni ? 'selected' : '' }}>
                            {{ $penghuni->nama_penghuni }}
                        </option>
                    @endforeach
                </select>
                @error('id_penghuni')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="id_kamar" class="block mb-2">Kamar:</label>
                <select name="id_kamar" id="id_kamar"
                    class="form-control @error('id_kamar') is-invalid @enderror" required>
                    <option value="">-- Pilih Kamar --</option>
                    @foreach ($kamars as $kamar)
                        <option value="{{ $kamar->id_kamar }}"
                            {{ old('id_kamar', $tagihan->id_kamar ?? '') == $kamar->id_kamar ? 'selected' : '' }}>
                            {{ $kamar->lokasi_kamar }}
                        </option>
                    @endforeach
                </select>
                @error('id_kamar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bulan_tagihan" class="block mb-2">Bulan Tagihan:</label>
                <select name="bulan_tagihan" id="bulan_tagihan"
                    class="form-control @error('bulan_tagihan') is-invalid @enderror" required>
                    <option value="">-- Pilih Bulan --</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}"
                            {{ old('bulan_tagihan', $tagihan->bulan_tagihan ?? '') == $i ? 'selected' : '' }}>
                            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                        </option>
                    @endfor
                </select>
                @error('bulan_tagihan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tahun_tagihan" class="block mb-2">Tahun Tagihan:</label>
                <input type="number" name="tahun_tagihan" id="tahun_tagihan"
                    class="form-control @error('tahun_tagihan') is-invalid @enderror"
                    value="{{ old('tahun_tagihan', $tagihan->tahun_tagihan ?? date('Y')) }}" required>
                @error('tahun_tagihan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="total_tagihan" class="block mb-2">Total Tagihan (Rp):</label>
                <input type="number" name="total_tagihan" id="total_tagihan"
                    class="form-control @error('total_tagihan') is-invalid @enderror"
                    value="{{ old('total_tagihan', $tagihan->total_tagihan ?? '') }}" step="0.01" required>
                @error('total_tagihan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status_pembayaran" class="block mb-2">Status Pembayaran:</label>
                <select name="status_pembayaran" id="status_pembayaran"
                    class="form-control @error('status_pembayaran') is-invalid @enderror" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Belum Lunas"
                        {{ old('status_pembayaran', $tagihan->status_pembayaran ?? '') == 'Belum Lunas' ? 'selected' : '' }}>
                        Belum Lunas
                    </option>
                    <option value="Lunas"
                        {{ old('status_pembayaran', $tagihan->status_pembayaran ?? '') == 'Lunas' ? 'selected' : '' }}>
                        Lunas
                    </option>
                </select>
                @error('status_pembayaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ $editMode ? 'Update' : 'Posting' }}
                </button>
                <a href="{{ route('tagihan.index') }}" class="btn btn-secondary ml-2">Kembali</a>
            </div>
        </form>
    </div>
@endsection
