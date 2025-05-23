@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h1>Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="kategori_kode" class="form-label">Kode Kategori</label>
            <input type="text" name="kategori_kode" class="form-control" value="{{ $kategori->kategori_kode }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori_nama" class="form-label">Nama Kategori</label>
            <input type="text" name="kategori_nama" class="form-control" value="{{ $kategori->kategori_nama }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
