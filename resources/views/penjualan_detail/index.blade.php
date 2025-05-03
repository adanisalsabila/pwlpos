@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Data Detail Penjualan</h1>
    <a href="{{ route('penjualan-detail.create') }}" class="btn btn-primary mb-3">Tambah Detail Penjualan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Penjualan</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualanDetails as $detail)
                    <tr>
                        <td>{{ $detail->detail_id }}</td>
                        <td>{{ $detail->penjualan->penjualan_kode ?? 'N/A' }}</td>
                        <td>{{ $detail->barang->barang_nama ?? 'N/A' }}</td>
                        <td>Rp. {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp. {{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('penjualan-detail.show', $detail->detail_id) }}" class="btn btn-info btn-sm">Lihat</a>
                            {{-- <a href="{{ route('penjualan-detail.edit', $detail->detail_id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ route('penjualan-detail.destroy', $detail->detail_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus detail penjualan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data detail penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'penjualandetail';
    @endphp
@endsection