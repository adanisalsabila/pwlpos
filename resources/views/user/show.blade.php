@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h2>Detail User</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Username: {{ $user->username }}</h5>
            <p class="card-text">Nama: {{ $user->nama }}</p>
            <p class="card-text">Level: {{ $user->level->level_nama ?? 'Tidak Ada Level' }}</p>
            <p class="card-text">Dibuat Pada: {{ $user->created_at }}</p>
            <p class="card-text">Diubah Pada: {{ $user->updated_at }}</p>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
