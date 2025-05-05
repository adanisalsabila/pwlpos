@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Barang</h3>
                    <a href="{{ route('barang.create') }}" class="btn btn-primary float-right">Tambah Barang</a>
                    {{-- <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-info mr-2">Import Barang</button> --}}
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered table-hover" id="table-barang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->barang_kode }}</td>
                                <td>{{ $barang->barang_nama }}</td>
                                <td>{{ $barang->kategori->kategori_nama ?? '-' }}</td>
                                <td>{{ $barang->supplier->supplier_nama ?? '-' }}</td>
                                <td>{{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                                <td>{{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('barang.show', $barang->barang_id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('barang.edit', $barang->barang_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('barang.destroy', $barang->barang_id) }}" method="POST" class="d-inline" onsubmit="return confirm('yakin ingin hapus?')">
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
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static"
    data-keyboard="false" data-width="75%"></div>
@endsection


