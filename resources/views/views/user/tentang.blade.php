<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GowesYuk - Tentang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <script src="{{ asset('js/navbar.js') }}"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
</head>
<body class="bg-[#E6E6FA] font-sans">

<!-- Navbar -->
<nav id="main-navbar" class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50 transition-transform duration-300">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/gowesyuk1.png') }}" alt="Logo GowesYuk" class="w-19 h-10" />
        <span class="text-xl font-bold text-gray-800">GowesYuk</span>
    </div>

    <div class="flex items-center space-x-6 justify-center flex-1">
        <a href="{{ url('landing_page') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Beranda</a>
        <a href="{{ url('sewa_sepeda') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Sewa Sepeda</a>
        <a href="{{ url('tentang') }}" class="px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm">Tentang</a>
        <a href="{{ url('rating') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Rating</a>
    </div>

    <div class="flex items-center space-x-3">
        {{-- Kalau belum login --}}
        @guest
            <a href="{{ url('masuk') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Masuk</a>
            <a href="{{ url('daftar') }}" class="bg-black text-white rounded-full px-4 py-1 font-semibold text-sm hover:bg-gray-900 transition">Daftar</a>
        @endguest

        {{-- Kalau sudah login --}}
        @auth
        <div class="relative group">
        <a href="{{ route('user.profile') }}" class="flex items-center">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="w-9 h-9 rounded-full" alt="Profile">
        </a>
       </div>
       @endauth
    </div>
</nav>

<!-- latar belakang -->
 

  <!-- Cara Kerja Section -->
  <section class="max-w-7xl mx-auto px-6 py-16 text-center">
  <h2 class="text-4xl font-semibold mb-2">Cara Kerja</h2>
  <p class="text-gray-500 mb-12">Proses sewa sepeda yang mudah dan cepat dalam 4 langkah sederhana</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Langkah 1 -->
      <div class="bg-white rounded-xl shadow-md p-6 relative">
        <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">
          search
        </span>
        </div>
        <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">1</div>
  <h3 class="font-semibold mb-2">Pilih Sepeda</h3>
  <p class="text-gray-400 text-sm">Cari dan pilih sepeda yang sesuai dengan kebutuhan Anda dari berbagai pilihan yang tersedia.</p>
      </div>

      <!-- Langkah 2 -->
      <div class="bg-white rounded-xl shadow-md p-6 relative">
        <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">
           credit_card
       </span>
        </div>
        <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">2</div>
  <h3 class="font-semibold mb-2">Bayar & Konfirmasi</h3>
  <p class="text-gray-400 text-sm">Lakukan pembayaran dengan aman melalui berbagai metode pembayaran yang tersedia.</p>
      </div>

      <!-- Langkah 3 -->
      <div class="bg-white rounded-xl shadow-md p-6 relative">
        <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">
           directions_bike
        </span>
        </div>
        <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">3</div>
  <h3 class="font-semibold mb-2">Ambil & Nikmati</h3>
  <p class="text-gray-400 text-sm">Ambil sepeda di lokasi yang telah ditentukan dan nikmati perjalanan Anda.</p>
      </div>

      <!-- Langkah 4 -->
      <div class="bg-white rounded-xl shadow-md p-6 relative">
        <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">
          replay
        </span>
        </div>
        <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">4</div>
  <h3 class="font-semibold mb-2">Kembalikan</h3>
  <p class="text-gray-400 text-sm">Kembalikan sepeda di lokasi yang sama atau lokasi drop-off terdekat.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black text-gray-300 pt-10 pb-6 px-6 mt-auto">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row justify-between gap-10">
      <div>
        <h3 class="font-bold text-xl mb-2 flex items-center gap-2">
          <img src="images/gowesyuk2.png" alt="Logo GowesYuk" class="w-10 h-10 object-contain">
          GowesYuk
        </h3>
        <p class="text-gray-300 text-sm leading-relaxed max-w-xs">
          Solusi rental sepeda terpercaya untuk mobilitas modern di seluruh Indonesia. 
          Nikmati perjalanan yang ramah lingkungan dan sehat.
        </p>
      </div>
      <div class="text-left -ml-40">
       <h4 class="font-semibold mb-3 text-white">Link Cepat</h4>
        <ul class="space-y-2 text-sm pl-0 ml-0">
         <li><a href="landing_page" class="hover:text-white transition">Beranda</a></li>
         <li><a href="sewa_sepeda" class="hover:text-white transition">Sewa Sepeda</a></li>
         <li><a href="about" class="hover:text-white transition">Tentang</a></li>
         <li><a href="rating" class="hover:text-white transition">Rating</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-white text-lg">Kontak</h4>
        <ul class="space-y-2 text-sm">
          <li>📞 +62 812-3456-7890</li>
          <li>✉️ support@gowesyuk.co.id</li>
          <li>🏢 Jl. Merdeka No. 45, Jakarta</li>
        </ul>
      </div>
    </div>
  <p class="text-center text-gray-500 text-xs mt-10">© 2025 GowesYuk. Semua hak cipta dilindungi.</p>
  </footer>

</body>
</html>
