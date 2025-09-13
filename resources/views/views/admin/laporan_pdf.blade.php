<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Customer</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            background: #fff;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-in_progress {
            background-color: #cce5ff;
            color: #004085;
        }
        .status-resolved {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Laporan Customer</h2>
    <p>Total Laporan: {{ $laporans->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>Kode Sepeda</th>
                <th>Tanggal</th>
                <th>Customer</th>
                <th>Nama Sepeda</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->kode_sepeda }}</td>
                    <td>{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</td>
                    <td>{{ $laporan->nama_lengkap }}<br>{{ $laporan->nomor_telepon }}</td>
                    <td>{{ $laporan->nama_sepeda }}</td>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ ucfirst($laporan->kategori) }}</td>
                    <td class="status-{{ $laporan->status }}">{{ ucfirst(str_replace('_',' ', $laporan->status)) }}</td>
                    <td>{{ str_repeat('★', $laporan->rating) . str_repeat('☆', 5 - $laporan->rating) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
