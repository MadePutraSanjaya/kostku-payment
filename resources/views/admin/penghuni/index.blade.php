@extends('welcome')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Daftar Penghuni</h1>
            <a href="{{ route('penghuni.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Penghuni
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penghuni</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penghuni as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama_penghuni }}</td>
                        <td>{{ $item->no_telepon }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('penghuni.edit', $item->id_penghuni) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('penghuni.destroy', $item->id_penghuni) }}" method="POST" class="d-inline" id="delete-form-{{ $item->id_penghuni }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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