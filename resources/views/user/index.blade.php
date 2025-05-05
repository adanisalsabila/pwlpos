@extends('layouts.template')

@section('content')
<div class="container-fluid">
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-header">
 <h3 class="card-title">Daftar User</h3>
 <a href="{{ route('user.create') }}" class="btn btn-primary float-right">Tambah User</a>
 </div>
 <div class="card-body">
 @if(session('success'))
 <div class="alert alert-success">{{ session('success') }}</div>
 @endif
 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th>Username</th>
 <th>Nama</th>
 <th>Level</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u->username }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->level->level_nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('user.show', $u->user_id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('user.edit', $u->user_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('user.destroy', $u->user_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
