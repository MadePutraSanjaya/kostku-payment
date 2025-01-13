@extends('layouts.admin')

@section('title', 'Daftar Kamar Kost')
@section('header', 'Daftar Kamar Kost')

@section('content')
<a href="{{ route('kamar_kosts.create') }}" class="btn btn-primary">Tambah Kamar</a>
<table>
    <thead>
        <tr>
            <th>Lokasi</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kamarKosts as $kamar)
        <tr>
            <td>{{ $kamar->lokasi_kamar }}</td>
            <td>{{ $kamar->harga_per_bulan }}</td>
            <td>{{ $kamar->status_kamar }}</td>
            <td>
                <a href="{{ route('kamar_kosts.edit', $kamar->id_kamar) }}">Edit</a>
                <form action="{{ route('kamar_kosts.destroy', $kamar->id_kamar) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
