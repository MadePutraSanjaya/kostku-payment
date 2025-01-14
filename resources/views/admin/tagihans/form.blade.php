@extends('welcome')

@section('title', $editMode ? 'Edit Tagihan' : 'Posting Tagihan')
@section('header', $editMode ? 'Edit Tagihan' : 'Posting Tagihan')

@section('content')
<form action="{{ $editMode ? route('tagihans.update', $tagihan->id_tagihan) : route('tagihans.store') }}" method="POST">
    @csrf
    @if ($editMode) @method('PUT') @endif

    <label for="id_penghuni">Penghuni:</label>
    <select name="id_penghuni" id="id_penghuni" required>
        <option value="">-- Pilih Penghuni --</option>
        @foreach ($penghunis as $penghuni)
        <option value="{{ $penghuni->id_penghuni }}" 
                {{ old('id_penghuni', $tagihan->id_penghuni ?? '') == $penghuni->id_penghuni ? 'selected' : '' }}>
            {{ $penghuni->nama_penghuni }}
        </option>
        @endforeach
    </select>

    <label for="id_kamar">Kamar:</label>
    <select name="id_kamar" id="id_kamar" required>
        <option value="">-- Pilih Kamar --</option>
        @foreach ($kamar_kosts as $kamar)
        <option value="{{ $kamar->id_kamar }}" 
                {{ old('id_kamar', $tagihan->id_kamar ?? '') == $kamar->id_kamar ? 'selected' : '' }}>
            {{ $kamar->lokasi_kamar }}
        </option>
        @endforeach
    </select>

    <label for="bulan_tagihan">Bulan Tagihan:</label>
    <select name="bulan_tagihan" id="bulan_tagihan" required>
        <option value="">-- Pilih Bulan --</option>
        @for ($i = 1; $i <= 12; $i++)
        <option value="{{ $i }}" 
                {{ old('bulan_tagihan', $tagihan->bulan_tagihan ?? '') == $i ? 'selected' : '' }}>
            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
        </option>
        @endfor
    </select>

    <label for="tahun_tagihan">Tahun Tagihan:</label>
    <input type="number" name="tahun_tagihan" id="tahun_tagihan" 
           value="{{ old('tahun_tagihan', $tagihan->tahun_tagihan ?? date('Y')) }}" required>

    <label for="total_tagihan">Total Tagihan (Rp):</label>
    <input type="number" name="total_tagihan" id="total_tagihan" 
           value="{{ old('total_tagihan', $tagihan->total_tagihan ?? '') }}" step="0.01" required>

    <button type="submit">{{ $editMode ? 'Update' : 'Posting' }}</button>
</form>
@endsection
