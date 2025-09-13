<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - GowesYuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin/pengguna_sepeda.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-[#e9e9f9]">

@include('admin.layout.navbar')  

<div class="page-content p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Kelola Pengguna</h1>
        <p class="text-gray-600">Monitor dan kelola pengguna aplikasi rental sepeda</p>
    </div>

    <!-- Search -->
    <div class="flex items-center mb-6 bg-white p-3 rounded-lg shadow">
        <div class="relative w-1/2">
            <i class="fa fa-search absolute left-3 top-3 text-gray-400"></i>
            <input type="text" id="search" placeholder="Cari berdasarkan nama, email, atau nomor telepon..."
                class="pl-10 pr-3 py-2 border rounded-lg w-full">
        </div>
    </div>

    <!-- Tabel Pengguna -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-3">Pengguna</th>
                    <th class="px-4 py-3">Kontak</th>
                    <th class="px-4 py-3">Alamat</th>
                    <th class="px-4 py-3">Jumlah Penyewaan</th>
                    <th class="px-4 py-3">Total Pengeluaran</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengguna as $u)
<tr class="border-b hover:bg-gray-50">
    <!-- Username -->
    <td class="px-4 py-3">
        <div class="flex items-center space-x-2">
            <i class="fa fa-user-circle text-xl"></i>
            <div class="flex flex-col">
                <span class="font-semibold">{{ $u->name }}</span>
            </div>
        </div>
    </td>

    <!-- Kontak -->
    <td class="px-4 py-3">
        <div class="flex flex-col">
            <span class="flex items-center">
                <i class="fa fa-envelope mr-2"></i> {{ $u->email }}
            </span>
            <span class="flex items-center">
                <i class="fa fa-phone mr-2"></i> {{ $u->phone }}
            </span>
        </div>
    </td>

    <!-- Alamat dari penyewaan -->
    <td class="px-4 py-3 flex items-center space-x-2">
        <i class="fa fa-location-dot"></i>
        <span>{{ optional($u->penyewaan->first())->alamat ?? '-' }}</span>
    </td>

    <!-- Jumlah Penyewaan -->
    <td class="px-4 py-3">
        <i class="fa fa-bicycle mr-2"></i> {{ $u->jumlah_penyewaan }} kali
    </td>

    <!-- Total Pengeluaran -->
    <td class="px-4 py-3 font-semibold">
        Rp {{ number_format($u->total_pengeluaran ?? 0, 0, ',', '.') }}
    </td>

    <!-- Status -->
<td>
    @if($u->status == 'aktif')
        <button onclick="toggleStatus('{{ $u->id }}', 'nonaktif')" 
            class="px-3 py-1 bg-black text-white rounded-full">
            Aktif
        </button>
    @else
        <button onclick="toggleStatus('{{ $u->id }}', 'aktif')" 
            class="px-3 py-1 bg-gray-500 text-white rounded-full">
            Nonaktif
        </button>
    @endif
</td>
</tr>
@endforeach

            </tbody>
        </table>
    </div>
</div>

</body>
</html>
