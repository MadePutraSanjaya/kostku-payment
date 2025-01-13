@extends('layouts.admin')

@section('title', 'Daftar Tagihan')
@section('header', 'Daftar Tagihan')

@section('content')
<a href="{{ route('tagihans.create') }}" class="btn btn-primary">Tambah Tagihan</a>
<table>
    <thead>
        <tr>
            <th>Penghuni</th>
            <th>Kamar</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Total Tagihan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tagihans as $tagihan)
        <tr>
            <td>{{ $tagihan->penghuni->nama_penghuni }}</td>
            <td>{{ $tagihan->kamar->lokasi_kamar }}</td>
            <td>{{ $tagihan->bulan_tagihan }}</td>
            <td>{{ $tagihan->tahun_tagihan }}</td>
            <td>{{ number_format($tagihan->total_tagihan, 2, ',', '.') }}</td>
            <td>{{ $tagihan->status_pembayaran }}</td>
            <td>
                <a href="{{ route('tagihans.edit', $tagihan->id_tagihan) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tagihans.destroy', $tagihan->id_tagihan) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
