@extends('welcome')

@section('content')
<div class="container">
    <h1>Daftar Tagihan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan Tagihan</th>
                <th>Total Tagihan</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagihans as $tagihan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tagihan->penghuni->nama_penghuni }}</td>
                    <td>{{ $tagihan->bulan_tagihan }} {{ $tagihan->tahun_tagihan }}</td>
                    <td>Rp {{ number_format($tagihan->total_tagihan, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($tagihan->status_pembayaran) }}</td>
                    <td>
                        <form action="{{ route('pembayaran.update', $tagihan->id_tagihan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Bayar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
