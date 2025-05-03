@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Level</h3>
                    <a href="{{ route('level.create') }}" class="btn btn-primary float-right">Tambah Level</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Level</th>
                                <th>Nama Level</th>
                                <th>Dibuat Pada</th>
                                <th>Diubah Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($levels as $level)
                            <tr>
                                <td>{{ $level->level_id }}</td>
                                <td>{{ $level->level_kode }}</td>
                                <td>{{ $level->level_nama }}</td>
                                <td>{{ $level->created_at }}</td>
                                <td>{{ $level->updated_at }}</td>
                                <td>
                                    <a href="{{ route('level.show', $level) }}" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('level.edit', $level) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('level.destroy', $level) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
