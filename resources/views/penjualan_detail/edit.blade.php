@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Edit Detail Penjualan</h1>

    <form action="{{ route('penjualan-detail.update', $penjualanDetail->detail_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="penjualan_id" class="form-label">ID Penjualan:</label>
                    <select name="penjualan_id" id="penjualan_id" class="form-control @error('penjualan_id') is-invalid @enderror">
                        <option value="">Pilih Penjualan</option>
                        @foreach ($penjualans as $penjualan)
                            <option value="{{ $penjualan->penjualan_id }}" {{ old('penjualan_id', $penjualanDetail->penjualan_id) == $penjualan->penjualan_id ? 'selected' : '' }}>
                                {{ $penjualan->penjualan_id }}
                            </option>
                        @endforeach
                    </select>
                    @error('penjualan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="barang_id" class="form-label">Nama Barang:</label>
                    <select name="barang_id" id="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
                        <option value="">Pilih Barang</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->barang_id }}" {{ old('barang_id', $penjualanDetail->barang_id) == $barang->barang_id ? 'selected' : '' }}>
                                {{ $barang->barang_nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="detail_harga" class="form-label">Harga:</label>
                    <input type="number" name="detail_harga" id="detail_harga" class="form-control @error('detail_harga') is-invalid @enderror" value="{{ old('detail_harga', $penjualanDetail->detail_harga) }}">
                    @error('detail_harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="detail_jumlah" class="form-label">Jumlah:</label>
                    <input type="number" name="detail_jumlah" id="detail_jumlah" class="form-control @error('detail_jumlah') is-invalid @enderror" value="{{ old('detail_jumlah', $penjualanDetail->detail_jumlah) }}">
                    @error('detail_jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="detail_subtotal" class="form-label">Subtotal:</label>
                    <input type="number" name="detail_subtotal" id="detail_subtotal" class="form-control @error('detail_subtotal') is-invalid @enderror" value="{{ old('detail_subtotal', $penjualanDetail->detail_subtotal) }}">
                    @error('detail_subtotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('penjualan-detail.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('active_menu')
    @php
        $activeMenu = 'penjualandetail';
    @endphp
@endsection