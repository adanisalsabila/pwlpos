<!DOCTYPE html>
<html>
<head>
    <title>Data Level</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Level</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Level</th>
                <th>Nama Level</th>
                <th>Dibuat Pada</th>
                <th>Diubah Pada</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>