@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Detail Stok</h1>
    <div class="mb-3">
        <label for="barang" class="form-label">Barang</label>
        <input type="text" class="form-control" id="barang" value="{{ $stok->barang->barang_nama ?? 'N/A' }}" readonly>
    </div>
    <div class="mb-3">
        <label for="user" class="form-label">User</label>
        <input type="text" class="form-control" id="user" value="{{ $stok->user->nama ?? 'N/A' }}" readonly>
    </div>
    <div class="mb-3">
        <label for="stok_tanggal" class="form-label">Tanggal Stok</label>
        <input type="text" class="form-control" id="stok_tanggal" value="{{ $stok->stok_tanggal }}" readonly>
    </div>
    <div class="mb-3">
        <label for="stok_jumlah" class="form-label">Jumlah Stok</label>
        <input type="number" class="form-control" id="stok_jumlah" value="{{ $stok->stok_jumlah }}" readonly>
    </div>
     <div class="mb-3">
        <label for="supplier" class="form-label">Supplier</label>
        <input type="text" class="form-control" id="supplier" value="{{ $stok->supplier->supplier_nama ?? 'N/A' }}" readonly>
    </div>
    <a href="{{ route('stok.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'stok';
    @endphp
@endsection
