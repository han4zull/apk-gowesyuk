<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Sepeda - GowesYuk</title> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="{{ asset('js/admin/kelola_sepeda.js') }}"></script>
</head>
<body class="bg-[#e9e9f9]">

    <!-- Navbar -->
    @include('admin.layout.navbar')  

    <div class="page-content p-6">
        <!-- Judul -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold">Kelola Sepeda</h1>
                <p class="text-gray-600">Kelola inventori sepeda rental anda.</p>
            </div>
            <a href="{{ route('admin.tambah_sepeda') }}" 
               class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-lg">
               + Tambah Sepeda
            </a>
        </div>

        <!-- Search & Filter -->
        <div class="flex items-center justify-between mb-6 bg-white p-3 rounded-lg shadow">
            <div class="relative w-1/3">
                <i class="fa fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" id="search" placeholder="Cari sepeda..."
                       class="pl-10 pr-3 py-2 border rounded-lg w-full">
            </div>
            <div class="space-x-2">
                <button class="filter-btn px-4 py-2 bg-gray-200 rounded-lg">Semua Status</button>
                <button class="filter-btn px-4 py-2 bg-green-600 text-white rounded-lg">Tersedia</button>
                <button class="filter-btn px-4 py-2 bg-red-500 text-white rounded-lg">Disewa</button>
                <button class="filter-btn px-4 py-2 bg-yellow-500 text-white rounded-lg">Perawatan</button>
            </div>
        </div>

        <!-- Tabel Sepeda -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-3">Sepeda</th>
                        <th class="px-4 py-3">Jenis</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Perawatan Terakhir</th>
                        <th class="px-4 py-3">Stok</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
@foreach($sepeda as $s)

    @php
        // Hitung jumlah sepeda yang sedang disewa atau dalam proses sewa
        $sepedaDisewa = \App\Models\Penyewaan::where('id_sepeda', $s->id)
                         ->where('status', 'proses') // status proses = sedang disewa
                         ->count();

        $stokSekarang = $s->stok - $sepedaDisewa;
        if ($stokSekarang < 0) $stokSekarang = 0; // jangan negatif
    @endphp

    <tr class="border-b hover:bg-gray-50">
        <!-- Sepeda (gambar + nama + kode) -->
        <td class="px-4 py-3 flex items-center space-x-3">
            @if($s->gambar_sepeda)
                <img src="{{ asset('storage/sepeda/' . $s->gambar_sepeda) }}" class="w-12 h-12 rounded object-contain bg-white-100 p-1">
            @else
                <div class="w-12 h-12 bg-gray-200 flex items-center justify-center rounded">🚲</div>
            @endif
            <div>
                <div class="font-semibold">{{ $s->nama_sepeda }}</div>
                <div class="text-gray-500 text-sm">{{ $s->kode_sepeda }}</div>
            </div>
        </td>

        <!-- Jenis -->
        <td class="px-4 py-3">{{ $s->jenis_sepeda }}</td>

        <!-- Status -->
        <td class="px-4 py-3">
            @if($stokSekarang > 0 && $s->kondisi === 'tersedia')
                <span class="px-3 py-1 bg-green-600 text-white rounded-full text-sm">Tersedia</span>
            @elseif($s->kondisi === 'disewa' || $stokSekarang <= 0)
                <span class="px-3 py-1 bg-red-500 text-white rounded-full text-sm">Disewa</span>
            @elseif($s->kondisi === 'perawatan')
                <span class="px-3 py-1 bg-yellow-500 text-white rounded-full text-sm">Perawatan</span>
            @elseif($s->kondisi === 'rusak')
                <span class="px-3 py-1 bg-gray-700 text-white rounded-full text-sm">Rusak</span>
            @endif
        </td>

        <!-- Perawatan terakhir -->
        <td class="px-4 py-3 flex items-center space-x-2 text-gray-600">
            <i class="fa fa-wrench"></i>
            <span>{{ $s->perawatan_terakhir ?? '-' }}</span>
        </td>

        <!-- Stok -->
        <td class="px-4 py-3">{{ $stokSekarang }}</td>

        <!-- Aksi -->
        <td class="px-4 py-2 flex space-x-2">
            <!-- Edit -->
            <a href="{{ route('admin.edit_sepeda', $s->id) }}" class="text-blue-600 hover:text-blue-800">
              <i class="fa fa-pen"></i>
            </a>

            <!-- Form Hapus -->
            <form id="hapus-form-{{ $s->id }}" action="{{ route('admin.hapus_sepeda', $s->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
            </form>
            <button type="button" class="hapus-btn text-red-600 hover:text-red-800" data-id="{{ $s->id }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
</tbody>

            </table>
        </div>
    </div>

</body>
</html>
