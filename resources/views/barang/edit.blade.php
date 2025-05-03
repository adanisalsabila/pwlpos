@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h4>Edit Data Barang</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $barang->barang_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="barang_kode">Kode Barang</label>
            <input type="text" name="barang_kode" class="form-control" value="{{ old('barang_kode', $barang->barang_kode) }}" required>
        </div>

        <div class="mb-3">
            <label for="barang_nama">Nama Barang</label>
            <input type="text" name="barang_nama" class="form-control" value="{{ old('barang_nama', $barang->barang_nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->kategori_id }}" {{ $kategori->kategori_id == $barang->kategori_id ? 'selected' : '' }}>
                        {{ $kategori->kategori_nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_id }}" {{ $supplier->supplier_id == $barang->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->supplier_nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli', $barang->harga_beli) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual', $barang->harga_jual) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
