@extends('welcome')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Daftar Tagihan</h1>
            <a href="{{ route('tagihan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Tagihan
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penghuni</th>
                    <th>Kamar</th>
                    <th>Bulan Tagihan</th>
                    <th>Tahun Tagihan</th>
                    <th>Total Tagihan (Rp)</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagihans as $key => $tagihan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $tagihan->penghuni->nama_penghuni }}</td>
                        <td>{{ $tagihan->kamar->lokasi_kamar }}</td>
                        <td>{{ DateTime::createFromFormat('!m', $tagihan->bulan_tagihan)->format('F') }}</td>
                        <td>{{ $tagihan->tahun_tagihan }}</td>
                        <td>{{ number_format($tagihan->total_tagihan, 2, ',', '.') }}</td>
                        <td>{{ $tagihan->status_pembayaran }}</td>
                        <td>
                            <a href="{{ route('tagihan.edit', $tagihan->id_tagihan) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tagihan.destroy', $tagihan->id_tagihan) }}" method="POST" class="d-inline"
                                id="delete-form-{{ $tagihan->id_tagihan }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
