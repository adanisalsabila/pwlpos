@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h2>Detail Level</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kode Level: {{ $level->level_kode }}</h5>
            <p class="card-text">Nama Level: {{ $level->level_nama }}</p>
            <p class="card-text">Dibuat Pada: {{ $level->created_at }}</p>
            <p class="card-text">Diubah Pada: {{ $level->updated_at }}</p>
            <a href="{{ route('level.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
