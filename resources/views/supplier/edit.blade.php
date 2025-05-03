@extends('layouts.template')

@section('active_supplier', 'active')

@section('content')
<div class="container-fluid">
    <h4>Edit Supplier</h4>
    <form action="{{ route('supplier.update', $supplier->supplier_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Kode Supplier</label>
            <input type="text" name="supplier_kode" class="form-control" value="{{ $supplier->supplier_kode }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Supplier</label>
            <input type="text" name="supplier_nama" class="form-control" value="{{ $supplier->supplier_nama }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $supplier->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $supplier->telepon }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $supplier->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
