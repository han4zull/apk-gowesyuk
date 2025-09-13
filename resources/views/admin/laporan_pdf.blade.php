{{-- resources/views/admin/laporan_pdf.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Customer</title>
    <link rel="stylesheet" href="{{ public_path('css/admin/laporan_pdf.css') }}">
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <div class="header-center">
            <img src="{{ public_path('images/gowesyuk1.png') }}" alt="Logo">
            <div class="header-text">
                <h2>Laporan Customer</h2>
                <h3>GowesYuk - Solusi Sepeda Anda</h3>
                <p>Wanaherang, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat</p>
                <p>Telp: 0885187803375 Email: gowesyuk2025@gmail.com</p>
            </div>
        </div>
    </div>

    <!-- SUMMARY -->
    <div class="summary">
        <p><strong>Total Laporan:</strong> {{ $laporans->count() }}</p>
        <p><strong>Tanggal Cetak:</strong> {{ now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }}</p>
    </div>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>Kode Sepeda & Tanggal</th>
                <th>Customer</th>
                <th>Nama Sepeda</th>
                <th>Judul & Kategori</th>
                <th>Status</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
                <tr>
                    <!-- Kode Sepeda & Tanggal -->
                    <td>
                        <strong>{{ $laporan->kode_sepeda }}</strong><br>
                        <small>{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</small>
                    </td>

                    <!-- Customer -->
                    <td>
                        <strong>{{ $laporan->customer->name }}</strong><br>
                        <small>{{ $laporan->customer->phone }}</small>
                    </td>

                    <!-- Nama Sepeda -->
                    <td>{{ $laporan->nama_sepeda }}</td>

                    <!-- Judul & Kategori -->
                    <td>
                        <strong>{{ $laporan->judul }}</strong><br>
                        <small>{{ ucfirst($laporan->kategori) }}</small>
                    </td>

                    <!-- Status -->
                    <td class="status-{{ $laporan->status }}">
                        @if($laporan->status == 'menunggu') Menunggu
                        @elseif($laporan->status == 'sedang_ditangani') Sedang Ditangani
                        @elseif($laporan->status == 'selesai') Selesai
                        @else - @endif
                    </td>

                    <!-- Rating -->
                    <td>{{ str_repeat('★', $laporan->rating) . str_repeat('☆', 5 - $laporan->rating) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        Dicetak oleh GowesYuk | {{ now()->setTimezone('Asia/Jakarta')->format('d M Y H:i') }}
    </div>

</body>
</html>
