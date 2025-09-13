<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penyewaan Sepeda</title>
    <link rel="stylesheet" href="{{ public_path('css/admin/penyewaan_pdf.css') }}">

</head>
<body>
    <!-- HEADER -->
    <div class="header">
    <div class="header-center">
        <img src="{{ public_path('images/gowesyuk1.png') }}" alt="Logo">
        <div class="header-text">
            <h2>Laporan Penyewaan Sepeda</h2>
            <h3>GowesYuk - Solusi Sepeda Anda<h3>
            <p>Wanaherang, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat</p>
            <p>Telp: 0885187803375 Email: gowesyuk2025@gmail.com</p>
        </div>
    </div>
    </div>


    <!-- SUMMARY -->
    <div class="summary">
        <p><strong>Total Penyewaan:</strong> {{ $penyewaan->count() }}</p>
        <p><strong>Tanggal Cetak:</strong> {{ now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }}</p>
    </div>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pengguna</th>
                <th>Sepeda</th>
                <th>Tanggal Pemesanan</th>
                <th>Durasi</th>
                <th>Biaya</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penyewaan as $p)
                <tr>
                    <td style="text-align:center">{{ $p->id_penyewaan }}</td>
                    <td>
                        {{ $p->customer->name ?? '-' }}<br>
                        <small>{{ $p->customer->phone ?? '-' }}</small>
                    </td>
                    <td>
                        {{ $p->nama_sepeda ?? '-' }}<br>
                        <small>{{ $p->kode_sepeda ?? '-' }}</small>
                    </td>
                    <td style="text-align:center">
                        {{ $p->tanggal ? \Carbon\Carbon::parse($p->tanggal)->format('d M Y') : '-' }}
                    </td>
                    <td style="text-align:center">
                        @php
                            $durasiText = '';
                            if($p->durasi_hari && $p->durasi_hari > 0){
                                $durasiText .= $p->durasi_hari . ' hari';
                            }
                            if($p->durasi_jam && $p->durasi_jam > 0){
                                if($durasiText != '') $durasiText .= ' ';
                                $durasiText .= $p->durasi_jam . ' jam';
                            }
                            if($durasiText == '') $durasiText = '-';
                        @endphp
                        {{ $durasiText }}
                    </td>
                    <td style="text-align:right">Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                    <td style="text-align:center">
                        @if($p->status === 'proses')
                            <span class="status-proses">Proses</span>
                        @elseif($p->status === 'selesai')
                            <span class="status-selesai">Selesai</span>
                        @elseif($p->status === 'batal')
                            <span class="status-batal">Dibatalkan</span>
                        @else
                            -
                        @endif
                    </td>
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
