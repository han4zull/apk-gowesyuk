<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sewa Sepeda 100 Card</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/user/sewa_sepeda.css') }}">
</head>

<body class="antialiased font-sans text-gray-900 min-h-screen flex flex-col custom-bg">
<!-- Navbar -->
    @include('user.layout.navbar')  

<!-- Konten Utama -->
<main class="flex-1 flex flex-col max-w-7xl mx-auto px-6 py-8 w-full">

  <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-3">
      Sewa Sepeda
  </h1>
  <p class="text-gray-600 text-lg leading-relaxed mb-8 max-w-2xl">
      Pilih sepeda yang sesuai dengan kebutuhan dan preferensi Anda.
  </p>

  <div class="flex gap-6">
    <!-- Filter -->
    <div class="bg-white p-4 rounded-lg shadow w-64 sticky top-24 self-start">
        <h2 class="font-semibold mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined">filter_alt</span> Filter Pencarian
        </h2>
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">Jenis Sepeda</label>
            <select id="jenis_sepeda" class="w-full border border-gray-300 rounded px-2 py-1">
                <option value="semua">Semua Jenis</option>
                <option value="listrik">Sepeda Listrik</option>
                <option value="gunung">Sepeda Gunung</option>
                <option value="lipat">Sepeda Lipat</option>
                <option value="hybrid">Sepeda Hybrid</option>
                <option value="bmx">Sepeda BMX</option>
                <option value="cruiser">Sepeda Cruiser</option>
                <option value="fixie">Sepeda Fixie</option>
                <option value="anak">Sepeda Anak</option>
                <option value="tandem">Sepeda Tandem</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">Rentang Harga</label>
            <select id="harga_jam" class="w-full border border-gray-300 rounded px-2 py-1">
                <option value="semua">Semua Harga</option>
                <option value="0-5000">0 - 5.000</option>
                <option value="5001-10000">5.000 - 10.000</option>
                <option value="10001-50000">10.000 - 50.000</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button id="btn-terapkan" class="bg-black text-white px-3 py-1 rounded font-bold">Terapkan</button>
            <button id="btn-reset" class="bg-gray-200 px-3 py-1 rounded">Reset</button>
        </div>
    </div>

    <!-- Daftar Sepeda -->
<div id="daftar-sepeda" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 flex-1">
  @foreach($sepeda as $s)
  <div class="bg-white rounded-lg shadow p-6 flex flex-col sepeda-card"
       data-jenis="{{ strtolower($s->jenis_sepeda) }}"
       data-harga="{{ $s->harga_jam }}">

      <span class="text-xs font-semibold mb-2">{{ strtoupper($s->jenis_sepeda) }}</span>

      <!-- Gambar default jika tidak ada -->
      <img src="{{ asset('storage/sepeda/' . ($s->gambar_sepeda ?? 'default.png')) }}" 
           alt="{{ $s->nama_sepeda }}" 
           class="mb-3 w-full h-40 object-contain">

      <h3 class="font-semibold mb-1 text-sm">{{ $s->nama_sepeda }}</h3>
      
      <div class="mt-auto">
        <p class="font-bold mb-3">
          Rp {{ number_format($s->harga_jam,0,",",".") }} 
          <span class="text-gray-500 font-normal text-sm">per jam</span>
        </p>
        
        <a href="{{ route('user.detail', $s->id) }}" class="bg-black text-white py-2 rounded font-bold hover:bg-gray-800 mt-auto block text-center"> SEWA SEKARANG </a>

      </div>
  </div>
  @endforeach
</div>

</main>

<!-- Footer -->
   @include('user.layout.footer') 

   <script src="{{ asset('js/user/sewa_sepeda.js') }}"></script>

</body>
</html>
