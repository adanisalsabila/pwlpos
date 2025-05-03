@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Tambah Detail Penjualan</h1>
    <form action="{{ route('penjualan-detail.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="penjualan_id" class="form-label">Kode Penjualan</label>
            <select class="form-control @error('penjualan_id') is-invalid @enderror" id="penjualan_id" name="penjualan_id">
                <option value="">Pilih Kode Penjualan</option>
                @foreach ($penjualans as $penjualan)
                    <option value="{{ $penjualan->penjualan_id }}" {{ old('penjualan_id') == $penjualan->penjualan_id ? 'selected' : '' }}>{{ $penjualan->penjualan_kode }}</option>
                @endforeach
            </select>
            @error('penjualan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="barang_id" class="form-label">Nama Barang</label>
            <select class="form-control @error('barang_id') is-invalid @enderror" id="barang_id" name="barang_id">
                <option value="">Pilih Nama Barang</option>
                @foreach ($barangs as $barang)
                    <option
                        value="{{ $barang->barang_id }}"
                        data-harga="{{ $barang->harga_jual }}"
                        {{ old('barang_id') == $barang->barang_id ? 'selected' : '' }}
                    >
                        {{ $barang->barang_nama }}
                    </option>
                @endforeach
            </select>
            @error('barang_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', 0) }}" readonly>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah', 1) }}">
            @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penjualan-detail.index') }}" class="btn btn-secondary">Batal</a>
    </form>