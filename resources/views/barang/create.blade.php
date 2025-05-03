@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h4>{{ isset($barang) ? 'Edit Barang' : 'Tambah Barang' }}</h4>
    <form action="{{ isset($barang) ? route('barang.update', $barang->barang_id) : route('barang.store') }}" method="POST">
        @csrf
        @if(isset($barang))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="barang_kode" class="form-control" value="{{ old('barang_kode', $barang->barang_kode ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="barang_nama" class="form-control" value="{{ old('barang_nama', $barang->barang_nama ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control">
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->kategori_id }}" {{ (old('kategori_id', $barang->kategori_id ?? '') == $kategori->kategori_id) ? 'selected' : '' }}>
                        {{ $kategori->kategori_nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Supplier</label>
            <select name="supplier_id" class="form-control">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_id }}" {{ (old('supplier_id', $barang->supplier_id ?? '') == $supplier->supplier_id) ? 'selected' : '' }}>
                        {{ $supplier->supplier_nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli', $barang->harga_beli ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual', $barang->harga_jual ?? '') }}" required>
        </div>
        <button class="btn btn-success">{{ isset($barang) ? 'Update' : 'Simpan' }}</button>
    </form>
</div>
@endsection
