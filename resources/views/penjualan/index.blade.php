@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Data Penjualan</h1>
    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Penjualan</th>
                    <th>Pembeli</th>
                    <th>Tanggal Penjualan</th>
                    <th>Kasir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $penjualan->penjualan_id }}</td>
                        <td>{{ $penjualan->penjualan_kode }}</td>
                        <td>{{ $penjualan->pembeli }}</td>
                        <td>{{ $penjualan->penjualan_tanggal }}</td>
                        <td>{{ $penjualan->user->nama ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('penjualan.show', $penjualan->penjualan_id) }}" class="btn btn-info btn-sm">Lihat</a>
                            {{-- <a href="{{ route('penjualan.edit', $penjualan->penjualan_id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ route('penjualan.destroy', $penjualan->penjualan_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus penjualan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'penjualan';
    @endphp
@endsection