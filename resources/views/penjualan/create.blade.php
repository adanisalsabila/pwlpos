@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Tambah Penjualan</h1>
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Kasir</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                <option value="">Pilih Kasir</option>
                @foreach ($users as $user)
                    <option value="{{ $user->user_id }}" {{ old('user_id') == $user->user_id ? 'selected' : '' }}>{{ $user->nama }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="penjualan_kode" class="form-label">Kode Penjualan</label>
            <input type="text" class="form-control @error('penjualan_kode') is-invalid @enderror" id="penjualan_kode" name="penjualan_kode" value="{{ old('penjualan_kode') }}">
            @error('penjualan_kode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pembeli" class="form-label">Nama Pembeli</label>
            <input type="text" class="form-control @error('pembeli') is-invalid @enderror" id="pembeli" name="pembeli" value="{{ old('pembeli') }}">
            @error('pembeli')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="penjualan_tanggal" class="form-label">Tanggal Penjualan</label>
            <input type="date" class="form-control @error('penjualan_tanggal') is-invalid @enderror" id="penjualan_tanggal" name="penjualan_tanggal" value="{{ old('penjualan_tanggal') }}">
            @error('penjualan_tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'penjualan';
    @endphp
@endsection
