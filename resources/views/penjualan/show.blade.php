@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Detail Penjualan</h1>
    <div class="mb-3">
        <label for="penjualan_kode" class="form-label">Kode Penjualan</label>
        <input type="text" class="form-control" id="penjualan_kode" value="{{ $penjualan->penjualan_kode }}" readonly>
    </div>
    <div class="mb-3">
        <label for="pembeli" class="form-label">Nama Pembeli</label>
        <input type="text" class="form-control" id="pembeli" value="{{ $penjualan->pembeli }}" readonly>
    </div>
    <div class="mb-3">
        <label for="penjualan_tanggal" class="form-label">Tanggal Penjualan</label>
        <input type="text" class="form-control" id="penjualan_tanggal" value="{{ $penjualan->penjualan_tanggal }}" readonly>
    </div>
    <div class="mb-3">
        <label for="user" class="form-label">Kasir</label>
        <input type="text" class="form-control" id="user" value="{{ $penjualan->user->nama ?? 'N/A' }}" readonly>
    </div>

    <h2 class="mt-4">Detail Barang</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @forelse ($penjualan->penjualanDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->barang->barang_nama ?? 'N/A' }}</td>
                    <td>Rp. {{ number_format($detail->harga, 0, ',', '.') }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>Rp. {{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
                    @php
                        $total += $detail->harga * $detail->jumlah;
                    @endphp
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada detail barang.</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="4" class="text-end"><b>Total</b></td>
                <td><b>Rp. {{ number_format($total, 0, ',', '.') }}</b></td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'penjualan';
    @endphp
@endsection
