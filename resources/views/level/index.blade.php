@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Level</h3>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('level.create') }}" class="btn btn-primary">Tambah</a>
                        {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importExcel">
                            Import Excel
                        </button>
                        <a href="{{ route('level.export.excel') }}" class="btn btn-info">Export Excel</a>
                        <a href="{{ route('level.export.pdf') }}" class="btn btn-danger">Export PDF</a> --}}
                    </div>

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

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="importExcelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{-- <form method="POST" action="{{ route('level.import.excel') }}" enctype="multipart/form-data"> --}}
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importExcelLabel">Import File Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih file Excel</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>
@endsection