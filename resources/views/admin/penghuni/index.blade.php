@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Daftar Penghuni</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penghuni</th>
                    <th>Alamat Penghuni</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penghuni as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama_penghuni }}</td>
                        <td>{{ $item->alamat_penghuni }}</td>
                        <td>
                            <a href="{{ route('penghuni.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('penghuni.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
