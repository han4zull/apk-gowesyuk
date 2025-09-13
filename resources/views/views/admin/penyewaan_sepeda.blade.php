<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Penyewaan - GowesYuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-[#e9e9f9]">

@include('admin.layout.navbar')  

<div class="page-content p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Kelola Penyewaan</h1>
        <p class="text-gray-600">Monitor dan kelola penyewaan sepeda aktif dan riwayat</p>
    </div>

    <!-- Search -->
    <div class="flex items-center mb-6 bg-white p-3 rounded-lg shadow">
        <div class="relative w-1/3">
            <i class="fa fa-search absolute left-3 top-3 text-gray-400"></i>
            <input type="text" id="search" placeholder="Cari berdasarkan nama pengguna, ID Rental, atau Sepeda..."
                class="pl-10 pr-3 py-2 border rounded-lg w-full">
        </div>
    </div>

    <!-- Tabel Penyewaan -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-3">ID Penyewaan</th>
                    <th class="px-4 py-3">Pengguna</th>
                    <th class="px-4 py-3">Sepeda</th>
                    <th class="px-4 py-3">Tanggal Pemesanan</th>
                    <th class="px-4 py-3">Durasi</th>
                    <th class="px-4 py-3">Biaya</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penyewaan as $p)
                <tr class="border-b hover:bg-gray-50" data-id="{{ $p->id_penyewaan }}">
                    <td class="px-4 py-3">{{ $p->id_penyewaan }}</td>
                    <td class="px-4 py-3">
                        <div class="flex flex-col">
                            <span class="font-semibold flex items-center">
                                <i class="fa fa-user mr-2"></i> {{ $p->customer->name ?? '-' }}
                            </span>
                            <span class="text-gray-500 text-sm">{{ $p->customer->phone ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex flex-col">
                            <span class="flex items-center">
                                <i class="fa fa-bicycle mr-2"></i> {{ $p->nama_sepeda }}
                            </span>
                            <span class="text-gray-500 text-sm">{{ $p->kode_sepeda }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 flex items-center space-x-2">
                        <i class="fa fa-calendar"></i>
                        <span>{{ $p->tanggal }}</span>
                    </td>
                    <td class="px-4 py-3">
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
                    <td class="px-4 py-3">Rp {{ number_format($p->total, 0, ',', '.') }}</td>

                    <!-- Status & Aksi -->
                    <td class="px-4 py-3 status-cell">
                        @if($p->status === 'proses')
                            <span class="px-3 py-1 bg-black text-white rounded-full text-sm">Proses</span>
                        @elseif($p->status === 'selesai')
                            <span class="px-3 py-1 bg-green-600 text-white rounded-full text-sm">Selesai</span>
                        @elseif($p->status === 'batal')
                            <span class="px-3 py-1 bg-red-600 text-white rounded-full text-sm">Dibatalkan</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 aksi-cell">
                        @if($p->status === 'proses')
                        <div class="flex space-x-2">
                            <button class="akhiri-btn bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600"
                                    data-id="{{ $p->id_penyewaan }}"
                                    data-status="selesai">
                                Selesai
                            </button>
                            <button class="batal-btn bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700"
                                    data-id="{{ $p->id_penyewaan }}"
                                    data-status="batal">
                                Batalkan
                            </button>
                        </div>
                        @elseif($p->status === 'selesai')
                            <span class="text-green-600 font-semibold">Selesai</span>
                        @elseif($p->status === 'batal')
                            <span class="text-red-600 font-semibold">Dibatalkan</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div id="statusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 w-[90%] max-w-md text-center">
        <h3 id="statusModalTitle" class="text-xl font-semibold mb-4"></h3>
        <p id="statusModalText" class="text-gray-500 mb-6"></p>
        <div class="flex justify-center gap-4">
            <button id="cancelStatus" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
            <form id="confirmStatusForm" method="POST" class="inline-block">
                @csrf
                <input type="hidden" name="status" value="">
                <input type="hidden" name="_method" value="">
                <button type="submit" id="confirmStatusBtn" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Konfirmasi
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.akhiri-btn, .batal-btn').forEach(btn => {
    btn.addEventListener('click', function(){
        const id = this.dataset.id;
        const status = this.dataset.status;
        const form = document.getElementById('confirmStatusForm');

        form.querySelector('input[name="status"]').value = status; // <- baris baru

        if(status === 'selesai'){
            form.action = `/admin/penyewaan/${id}/selesai`;
            form.method = 'POST';
            form.querySelector('input[name="_method"]').value = '';
        } else if(status === 'batal'){
            form.action = `/admin/penyewaan/${id}/batal`;
            form.method = 'POST';
            form.querySelector('input[name="_method"]').value = 'DELETE';
        }

        const title = document.getElementById('statusModalTitle');
        const text = document.getElementById('statusModalText');
        if(status === 'selesai'){
            title.textContent = 'Akhiri Penyewaan?';
            text.textContent = 'Apakah Anda yakin ingin mengakhiri penyewaan ini?';
        } else {
            title.textContent = 'Batalkan Penyewaan?';
            text.textContent = 'Apakah Anda yakin ingin membatalkan penyewaan ini?';
        }

        document.getElementById('statusModal').classList.remove('hidden');
    });
});
</script>

</body>
</html>
