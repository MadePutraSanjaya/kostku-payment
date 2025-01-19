@extends('layouts.app')

@section('content')
    <h1>Edit Status Pembayaran</h1>

    <form action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control @error('status_pembayaran') is-invalid @enderror">
                <option value="belum_dibayar" {{ $pembayaran->status_pembayaran == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                <option value="sudah_dibayar" {{ $pembayaran->status_pembayaran == 'sudah_dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
            </select>
            @error('status_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
