@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h4>Detail Barang</h4>
    <div class="card">
        <div class="card-body">
            <p>Kode: {{ $barang->barang_kode }}</p>
            <p>Nama: {{ $barang->barang_nama }}</p>
            <p>Kategori: {{ $barang->kategori->kategori_nama ?? '-' }}</p>
            <p>Supplier: {{ $barang->supplier->supplier_nama ?? '-' }}</p>
            <p>Harga Beli: {{ number_format($barang->harga_beli) }}</p>
            <p>Harga Jual: {{ number_format($barang->harga_jual) }}</p>
        </div>
    </div>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
