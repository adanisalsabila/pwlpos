@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Daftar Kategori</h1>
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary float-right">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kode Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
            @foreach($kategori as $k)
            <tr>
                <td>{{ $k->kategori_kode }}</td>
                <td>{{ $k->kategori_nama }}</td>
                <td>
                    <a href="{{ route('kategori.show', $k->kategori_id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('kategori.edit', $k->kategori_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kategori.destroy', $k->kategori_id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
