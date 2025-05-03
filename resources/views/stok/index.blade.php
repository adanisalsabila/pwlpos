@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Data Stok</h1>
    <a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">Tambah Stok</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Barang</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Supplier</th> {{-- Tambah Supplier --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stoks as $stok)
                    <tr>
                        <td>{{ $stok->stok_id }}</td>
                        <td>{{ $stok->barang->barang_nama ?? 'N/A' }}</td>
                        <td>{{ $stok->user->nama }}</td>
                        <td>{{ $stok->stok_tanggal }}</td>
                        <td>{{ $stok->stok_jumlah }}</td>
                        <td>{{ $stok->supplier->supplier_nama ?? 'N/A' }}</td> {{-- Tampilkan Nama Supplier --}}
                        <td>
                            <a href="{{ route('stok.show', $stok->stok_id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('stok.edit', $stok->stok_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('stok.destroy', $stok->stok_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus stok ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data stok.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'stok';
    @endphp
@endsection