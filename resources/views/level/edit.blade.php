@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h2>Edit Level</h2>
    <form action="{{ route('level.update', $level->level_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="level_kode" class="form-label">Kode Level</label>
            <input type="text" class="form-control @error('level_kode') is-invalid @enderror"
                   id="level_kode" name="level_kode" value="{{ old('level_kode', $level->level_kode) }}">
            @error('level_kode')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level_nama" class="form-label">Nama Level</label>
            <input type="text" class="form-control @error('level_nama') is-invalid @enderror"
                   id="level_nama" name="level_nama" value="{{ old('level_nama', $level->level_nama) }}">
            @error('level_nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('level.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
