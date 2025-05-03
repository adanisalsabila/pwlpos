@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <h2>Edit User</h2>
    <form action="{{ route('user.update', $user->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="level_id" class="form-label">Level</label>
            <select name="level_id" id="level_id" class="form-control" required>
                @foreach($levels as $level)
                    <option value="{{ $level->level_id }}" {{ $user->level_id == $level->level_id ? 'selected' : '' }}>
                        {{ $level->level_nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required maxlength="20" value="{{ $user->username }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required maxlength="100" value="{{ $user->nama }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" id="password" class="form-control" minlength="6">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
