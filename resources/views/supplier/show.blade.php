@extends('layouts.template')

@section('active_supplier', 'active')

@section('content')
<div class="container-fluid">
    <h4>Detail Supplier</h4>
    <table class="table">
        <tr>
            <th>Kode Supplier</th>
            <td>{{ $supplier->supplier_kode }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $supplier->supplier_nama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $supplier->alamat }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $supplier->telepon }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $supplier->email }}</td>
        </tr>
    </table>
    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
