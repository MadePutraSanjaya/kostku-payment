@extends('welcome')

@section('content')
<div class="container">
    <h1>Daftar Riwayat</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan Tagihan</th>
                <th>Total Tagihan</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagihans as $tagihan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tagihan->bulan_tagihan }} {{ $tagihan->tahun_tagihan }}</td>
                    <td>Rp {{ number_format($tagihan->total_tagihan, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($tagihan->status_pembayaran) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
