@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h2>Tambah User</h2>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="level_id" class="form-label">Level</label>
            <select name="level_id" id="level_id" class="form-control" required>
                <option value="">-- Pilih Level --</option>
                @foreach($levels as $level)
                    <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required maxlength="20">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required maxlength="100">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="6">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
