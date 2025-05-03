@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Edit Stok</h1>
    <form action="{{ route('stok.update', $stok->stok_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select class="form-control @error('barang_id') is-invalid @enderror" id="barang_id" name="barang_id">
                <option value="">Pilih Barang</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->barang_id }}" {{ old('barang_id', $stok->barang_id) == $barang->barang_id ? 'selected' : '' }}>{{ $barang->barang_nama }}</option>
                @endforeach
            </select>
            @error('barang_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                <option value="">Pilih User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->user_id }}" {{ old('user_id', $stok->user_id) == $user->user_id ? 'selected' : '' }}>{{ $user->nama }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stok_tanggal" class="form-label">Tanggal Stok</label>
            <input type="date" class="form-control @error('stok_tanggal') is-invalid @enderror" id="stok_tanggal" name="stok_tanggal" value="{{ old('stok_tanggal', $stok->stok_tanggal) }}">
            @error('stok_tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stok_jumlah" class="form-label">Jumlah Stok</label>
            <input type="number" class="form-control @error('stok_jumlah') is-invalid @enderror" id="stok_jumlah" name="stok_jumlah" value="{{ old('stok_jumlah', $stok->stok_jumlah) }}">
            @error('stok_jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select class="form-control @error('supplier_id') is-invalid @enderror" id="supplier_id" name="supplier_id">
                <option value="">Pilih Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_id }}" {{ old('supplier_id', $stok->supplier_id) == $supplier->supplier_id ? 'selected' : '' }}>{{ $supplier->supplier_nama }}</option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('stok.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'stok';
    @endphp
@endsection