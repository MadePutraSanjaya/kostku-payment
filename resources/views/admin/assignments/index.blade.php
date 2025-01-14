@extends('welcome')

@section('title', 'Daftar Assignments')
@section('header', 'Daftar Assignments Penghuni ke Kamar')

@section('content')
<a href="{{ route('assignments.create') }}" class="btn btn-primary">Assign Penghuni ke Kamar</a>
<table>
    <thead>
        <tr>
            <th>Nama Penghuni</th>
            <th>Kamar</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assignments as $assignment)
        <tr>
            <td>{{ $assignment->penghuni->nama_penghuni }}</td>
            <td>{{ $assignment->kamar->lokasi_kamar }}</td>
            <td>{{ $assignment->tanggal_mulai }}</td>
            <td>{{ $assignment->tanggal_akhir }}</td>
            <td>
                <form action="{{ route('assignments.destroy', $assignment->id_assignment) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
