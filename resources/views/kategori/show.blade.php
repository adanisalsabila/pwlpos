@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Detail Kategori</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kode: {{ $kategori->kategori_kode }}</h5>
            <p class="card-text">Nama: {{ $kategori->kategori_nama }}</p>
            <p class="card-text">Dibuat: {{ $kategori->created_at }}</p>
            <p class="card-text">Diubah: {{ $kategori->updated_at }}</p>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
