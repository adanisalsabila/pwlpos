@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Detail Penjualan Detail</h1>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">ID Penjualan Detail:</label>
                <input type="text" class="form-control" value="{{ $penjualanDetail->detail_id }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">ID Penjualan:</label>
                <input type="text" class="form-control" value="{{ $penjualanDetail->penjualan->penjualan_id ?? 'N/A' }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang:</label>
                <input type="text" class="form-control" value="{{ $penjualanDetail->barang->barang_nama ?? 'N/A' }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga:</label>
                <input type="text" class="form-control" value="{{ $penjualanDetail->detail_harga }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah:</label>
                <input type="text" class="form-control" value="{{ $penjualanDetail->detail_jumlah }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Subtotal:</label>
                <input type="text" class="form-control" value="{{ $penjualanDetail->detail_subtotal }}" readonly>
            </div>

            <a href="{{ route('penjualan-detail.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'penjualan_detail';
    @endphp
@endsection
