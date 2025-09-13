<!-- resources/views/sepeda/detail.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Sepeda - GowesYuk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/user/detail_produk.css') }}">
</head>
<body class="antialiased font-sans text-gray-900 min-h-screen flex flex-col custom-bg">

<!-- Navbar -->
@include('user.layout.navbar')

<!-- Product Detail -->
<main class="max-w-7xl mx-auto px-6 py-8 flex-1">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">

    <!-- Image & Description -->
    <div class="flex flex-col items-center space-y-4">
      <div class="w-full max-w-md bg-white rounded-lg shadow border-2 border-black p-2">
        <img src="{{ asset('storage/sepeda/'.$sepeda->gambar_sepeda) }}" alt="{{ $sepeda->nama_sepeda }}" class="w-full h-auto object-contain rounded-md">
      </div>
      <div class="w-full max-w-md bg-white p-5 rounded-lg shadow border text-gray-700">
        <h3 class="text-lg font-semibold mb-2 border-b pb-2">Deskripsi Produk</h3>
        <p class="leading-relaxed text-justify">{{ $sepeda->deskripsi_sepeda }}</p>
      </div>
    </div>

    <!-- Info & Action -->
    <div class="space-y-6">
      <h1 class="text-3xl font-bold mb-3">{{ $sepeda->nama_sepeda }}</h1>
      <div class="flex items-center space-x-4 mb-4">
        @php
    // Hitung stok tersedia secara virtual
    $stokTerpakai = \App\Models\Penyewaan::where('id_sepeda', $sepeda->id)
                    ->where('status', 'proses')
                    ->count();

    $stokSekarang = $sepeda->stok - $stokTerpakai;
    $statusTampil = $stokSekarang <= 0 ? 'Disewa' : 'Tersedia';
    @endphp

<div class="flex items-center">
    <div class="flex text-yellow-400">⭐⭐⭐⭐⭐</div>
    <span class="ml-2 text-sm text-gray-600">{{ $stokSekarang }} Tersedia</span>
</div>

<span class="px-2 py-1 rounded-full text-xs font-medium {{ $statusTampil == 'Disewa' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
    {{ $statusTampil }}
</span>

      </div>
      <p class="text-3xl font-bold text-black">Rp {{ number_format($sepeda->harga_jam, 0, ',', '.') }} <span class="text-lg font-normal text-gray-600">/ jam</span></p>

      <!-- Rental Options -->
      <div class="space-y-4">
        <h3 class="font-semibold text-lg">Pilihan Sewa</h3>
        <div class="space-y-3">
          <div class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50">
            <div>
              <label class="font-medium">Per Jam</label>
              <p class="text-sm text-gray-600 ml-2">Minimal 1 jam</p>
            </div>
            <span class="font-semibold">Rp {{ number_format($sepeda->harga_jam,0,',','.') }}</span>
          </div>
          <div class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50">
            <div>
              <label class="font-medium">Per Hari</label>
              <p class="text-sm text-gray-600 ml-2">24 jam</p>
            </div>
            <span class="font-semibold">Rp {{ number_format($sepeda->harga_hari,0,',','.') }}</span>
          </div>
        </div>
      </div>

      <!-- Buttons -->
      <button id="openRentalBtn" class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 text-sm">Sewa Sekarang</button>
      <div class="grid grid-cols-2 gap-3">
        <form method="POST" action="{{ route('user.keranjang') }}" id="cartForm" data-csrf="{{ csrf_token() }}">
    @csrf
    <input type="hidden" name="sepeda_id" value="{{ $sepeda->id }}">
    <button type="submit" class="border border-black py-2 rounded-lg font-semibold hover:bg-gray-100 transition w-full">
        🛒 Tambah ke Keranjang
    </button>
</form>
        <button id="helpBtn" class="border border-black py-2 rounded-lg font-semibold hover:bg-gray-100 transition w-full">📞 Bantuan</button>
      </div>
    </div>
  </div>
</main>

<!-- Modal Sukses Tambah ke Keranjang -->
<div id="cartSuccessModal" class="fixed inset-0 z-50 hidden">
  <div class="absolute inset-0 bg-black/50"></div>
  <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-sm rounded-xl shadow-lg border p-6 text-center">
      <div class="text-4xl mb-2">✅</div>
      <h3 class="text-lg font-semibold mb-2">Berhasil!</h3>
      <p class="text-sm text-gray-600 mb-4">Sepeda berhasil ditambahkan ke keranjangmu.</p>
      <div class="flex gap-3 justify-center">
        <a href="{{ url('keranjang') }}" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 text-sm">Lihat Keranjang</a>
        <button id="closeCartModal" class="px-4 py-2 border rounded-md hover:bg-gray-50 text-sm">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- Include Modal -->
@include('user.pop_up')

<!-- Footer -->
@include('user.layout.footer')

<!-- JS -->
<script src="{{ asset('js/user/detail_produkjs.js') }}"></script>
</body>
</html>
