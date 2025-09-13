{{-- resources/views/admin/laporan.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-[#e9e9f9] font-sans" x-data="{ openModal: false, selectedLaporan: null }">

    <!-- Navbar -->
    @include('admin.layout.navbar')

    <div class="page-content p-6">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold">Laporan Customer</h1>
            <p class="text-gray-600">Kelola laporan masalah dan keluhan dari customer</p>
        </div>

       <!-- Search -->
<div class="flex items-center justify-between mb-6">
    <!-- Search bar (persis kayak penyewaan_sepeda) -->
    <div class="relative w-1/3">
        <i class="fa fa-search absolute left-3 top-3 text-gray-400"></i>
        <form method="GET" action="{{ route('laporan.index') }}">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari laporan berdasarkan nama, kode sepeda, atau judul..."
                class="pl-10 pr-3 py-2 border rounded-lg w-full shadow focus:outline-none focus:ring-2 focus:ring-purple-300">
        </form>
    </div>

    <!-- Export tombol -->
    <a href="{{ route('laporan.export') }}" 
       class="flex items-center gap-2 bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 shadow">
        <i class="fa fa-file-export"></i> Export Laporan
    </a>
</div>

        <!-- Tabel Laporan -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-3">Kode Sepeda & Tanggal</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Nama Sepeda</th>
                        <th class="px-4 py-3">Judul & Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Rating</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $laporan)
                        <tr class="border-b hover:bg-gray-50">
                            <!-- Kode & Tanggal -->
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $laporan->kode_sepeda }}</div>
                                <div class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</div>
                            </td>

                            <!-- Customer -->
                            <td class="px-4 py-3">
                                <div class="flex flex-col">
                                    <span class="font-semibold flex items-center">
                                        <i class="fa fa-user mr-2 text-gray-500"></i> {{ $laporan->nama_lengkap }}
                                    </span>
                                    <span class="text-gray-500 text-sm">{{ $laporan->nomor_telepon }}</span>
                                </div>
                            </td>

                            <!-- Sepeda -->
                            <td class="px-4 py-3">{{ $laporan->nama_sepeda }}</td>

                            <!-- Judul & Kategori -->
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $laporan->judul }}</div>
                                <div class="text-gray-500 text-sm">{{ ucfirst($laporan->kategori) }}</div>
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3">
                                @if($laporan->status == 'sedang_ditangani')
                                    <span class="px-3 py-1 bg-blue-400/20 text-blue-700 rounded-full text-sm">Sedang Ditangani</span>
                                @elseif($laporan->status == 'selesai')
                                    <span class="px-3 py-1 bg-green-500/20 text-green-700 rounded-full text-sm">Selesai</span>
                                @else($laporan->status == 'menunggu')
                                    <span class="px-3 py-1 bg-yellow-500/20 text-yellow-800 rounded-full text-sm">Menunggu</span>
                                @endif
                            </td>


                            <!-- Rating -->
                            <td class="px-4 py-3 text-yellow-400 font-semibold">
                                {{ str_repeat('★', $laporan->rating) . str_repeat('☆', 5 - $laporan->rating) }}
                            </td>

                            <!-- Aksi -->
                            <td class="px-4 py-3">
                                <button 
                                    @click="openModal = true; selectedLaporan = {
                                        ...{{ $laporan->toJson() }},
                                        tanggal_format: '{{ \Carbon\Carbon::parse($laporan->tanggal)->translatedFormat('d F Y') }}'
                                    }" 
                                    class="px-3 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                                    <i class="fa fa-eye mr-1"></i> Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Modal Detail Laporan -->
<template x-if="openModal">
    <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white w-[500px] rounded-2xl shadow-xl p-6 relative">
            
            <!-- Header -->
            <h2 class="text-xl font-bold mb-5 text-gray-800">Detail Laporan</h2>

            <!-- Info Customer -->
            <div class="flex items-start justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center shadow-sm">
                        <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 
                            2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 
                            1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800" x-text="selectedLaporan?.nama_lengkap"></p>
                        <p class="text-gray-500 text-sm" x-text="selectedLaporan?.nomor_telepon"></p>
                        <p class="text-gray-500 text-sm" x-text="selectedLaporan?.email"></p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-400">Kode Sepeda</p>
                    <p class="font-semibold text-gray-800" x-text="selectedLaporan?.kode_sepeda"></p>
                    <p class="text-gray-500 text-sm" x-text="selectedLaporan?.tanggal_format"></p>
                </div>
            </div>

            <div class="border-t my-5"></div>

            <!-- Detail -->
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-500">Sepeda</p>
                    <p class="font-semibold text-gray-800" x-text="selectedLaporan?.nama_sepeda"></p>
                </div>
                <div>
                    <p class="text-gray-500">Kategori</p>
                    <p class="font-semibold text-gray-800" x-text="selectedLaporan?.kategori"></p>
                </div>
                <div>
                    <p class="text-gray-500">Status</p>
                    <span :class="{
                            'bg-yellow-100 text-yellow-700': selectedLaporan?.status == 'menunggu',
                            'bg-blue-100 text-blue-700': selectedLaporan?.status == 'sedang_ditangani',
                            'bg-green-100 text-green-700': selectedLaporan?.status == 'selesai'
                        }"
                        class="px-2 py-0.5 rounded-full text-xs font-medium"
                        x-text=" selectedLaporan?.status == 'menunggu' ? 'Menunggu' : (selectedLaporan?.status == 'sedang_ditangani' ? 'Sedang Ditangani' : 'Selesai') ">
                    </span>
                </div>
                <div>
                    <p class="text-gray-500">Rating</p>
                    <p class="text-yellow-400 font-semibold"
                        x-html="Array(selectedLaporan?.rating).fill('★').join('') + Array(5 - selectedLaporan?.rating).fill('☆').join('')"></p>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mt-5">
                <p class="text-gray-500 text-sm mb-1">Deskripsi Masalah</p>
                <div class="bg-gray-50 rounded-lg p-3 text-sm text-gray-700 shadow-inner"
                     x-text="selectedLaporan?.deskripsi_masalah"></div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3 mt-6">
                <button @click="openModal = false"
                    class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                    Tutup
                </button>
                <form :action="'/admin/laporan/' + selectedLaporan?.id + '/update-status'" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="sedang_ditangani">
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-700 shadow">
                        Mulai Tangani
                    </button>
                </form>
                <form :action="'/admin/laporan/' + selectedLaporan?.id + '/update-status'" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="selesai">
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700 shadow">
                        Selesai
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

</body>
</html>
