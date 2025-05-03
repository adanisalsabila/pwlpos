@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kategori_kode" class="form-label">Kode Kategori</label>
            <input type="text" name="kategori_kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kategori_nama" class="form-label">Nama Kategori</label>
            <input type="text" name="kategori_nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
