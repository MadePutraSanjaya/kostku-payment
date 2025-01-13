@extends('layouts.admin')

@section('title', 'Assign Penghuni')
@section('header', 'Assign Penghuni ke Kamar')

@section('content')
<form action="{{ route('assignments.store') }}" method="POST">
    @csrf
    <label>Penghuni:</label>
    <select name="id_penghuni">
        @foreach ($penghunis as $penghuni)
        <option value="{{ $penghuni->id_penghuni }}">{{ $penghuni->nama_penghuni }}</option>
        @endforeach
    </select>
    <label>Kamar:</label>
    <select name="id_kamar">
        @foreach ($kamarKosts as $kamar)
        <option value="{{ $kamar->id_kamar }}">{{ $kamar->lokasi_kamar }}</option>
        @endforeach
    </select>
    <label>Tanggal Mulai:</label>
    <input type="date" name="tanggal_mulai">
    <label>Tanggal Akhir:</label>
    <input type="date" name="tanggal_akhir">
    <button type="submit">Assign</button>
</form>
@endsection
