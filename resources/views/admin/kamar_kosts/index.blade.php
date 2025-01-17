@extends('welcome')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Daftar Kamar</h1>
            <a href="{{ route('kamar.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Kamar
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
                    <th>Lokasi Kamar</th>
                    <th>Fasilitas</th>
                    <th>Status Kamar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kamar_kosts as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->lokasi_kamar }}</td>
                        <td>{{ $item->fasilitas }}</td>
                        <td>{{ $item->status_kamar }}</td>
                        <td>
                            <a href="{{ route('kamar.edit', $item->id_kamar) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kamar.destroy', $item->id_kamar) }}" method="POST" class="d-inline"
                                id="delete-form-{{ $item->id_kamar }}">
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
