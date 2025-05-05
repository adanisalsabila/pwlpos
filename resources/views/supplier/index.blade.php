@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Supplier</h3>
                    <a href="{{ route('supplier.create') }}" class="btn btn-primary float-right">Tambah Supplier</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->supplier_kode }}</td>
                    <td>{{ $row->supplier_nama }}</td>
                    <td>{{ $row->telepon }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                        <a href="{{ route('supplier.show', $row->supplier_id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('supplier.edit', $row->supplier_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('supplier.destroy', $row->supplier_id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
