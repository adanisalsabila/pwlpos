@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h4>Data Barang</h4>
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
                <tr>
                    <td>{{ $barang->barang_kode }}</td>
                    <td>{{ $barang->barang_nama }}</td>
                    <td>{{ $barang->kategori->kategori_nama ?? '-' }}</td>
                    <td>{{ $barang->supplier->supplier_nama ?? '-' }}</td>
                    <td>{{ number_format($barang->harga_beli) }}</td>
                    <td>{{ number_format($barang->harga_jual) }}</td>
                    <td>
                        <a href="{{ route('barang.show', $barang->barang_id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('barang.edit', $barang->barang_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->barang_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
