@extends('layouts.template')

@section('active_supplier', 'active')

@section('content')
<div class="container-fluid">
    <h4>Tambah Supplier</h4>
    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Supplier</label>
            <input type="text" name="supplier_kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Supplier</label>
            <input type="text" name="supplier_nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
