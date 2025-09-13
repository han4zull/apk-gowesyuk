<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sewa Sepeda Terbaik</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=local_fire_department" />
  <script src="{{ asset('js/logoutjs.js') }}"></script>
  <script src="{{ asset('js/navbar.js') }}"></script>

  <style>
    /* Hide Scrollbar */
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>

<body class="bg-[#d6d6f5] font-sans text-gray-900 min-h-screen flex flex-col">

  <!-- Popup Berhasil Keluar -->
  <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 text-center max-w-sm w-full">
      <h2 class="text-xl font-bold mb-4 text-green-600">Anda berhasil keluar</h2>
    </div>
  </div>
  
  <!-- Navbar -->
<nav id="main-navbar" class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50 transition-transform duration-300">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/gowesyuk1.png') }}" alt="Logo GowesYuk" class="w-19 h-10" />
        <span class="text-xl font-bold text-gray-800">GowesYuk</span>
    </div>

    <div class="flex items-center space-x-6 justify-center flex-1">
        <a href="{{ url('landing_page') }}" class="px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm">Beranda</a>
        <a href="{{ url('sewa_sepeda') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Sewa Sepeda</a>
        <a href="{{ url('about') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Tentang</a>
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
        <a href="{{ route('profile') }}" class="flex items-center">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="w-9 h-9 rounded-full" alt="Profile">
        </a>
       </div>
       @endauth
    </div>
</nav>



  <!-- Header / Hero -->
  <header class="flex flex-col lg:flex-row items-center justify-between max-w-7xl mx-auto px-6 py-16 gap-10 lg:gap-20 mt-16">
    <div class="max-w-lg text-left space-y-5">
      <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">Jelajahi Kota dengan Sepeda Terbaik</h1>
      <p class="text-gray-700 text-lg leading-relaxed">Sewa sepeda berkualitas tinggi untuk petualangan harian Anda. Mudah, cepat, dan terpercaya di seluruh kota.</p>
<div class="flex gap-4">
    @guest
        <!-- Kalau belum login, arahkan ke form masuk -->
        <a href="{{ url('masuk') }}" 
           class="bg-black text-white py-3 px-6 rounded font-semibold text-base hover:bg-gray-800 transition text-center">
           Mulai Rental Sekarang
        </a>
    @else
        <!-- Kalau sudah login, arahkan ke halaman sewa -->
        <a href="{{ url('sewa_sepeda') }}" 
           class="bg-black text-white py-3 px-6 rounded font-semibold text-base hover:bg-gray-800 transition text-center">
           Mulai Rental Sekarang
        </a>
    @endguest

        <a href="sewa_sepeda" class="border border-black py-3 px-6 rounded font-semibold text-base hover:bg-gray-200 hover:scale-105 transition transform text-center">
          Lihat Sepeda
        </a>
</div>

    </div>
    <div class="bg-white rounded-3xl shadow-lg px-8 py-6 max-w-md w-full flex justify-center">
      <img src="{{ asset('image/sepeda1.jpg') }}" alt="Sepeda gunung hitam modern" class="object-contain h-72" onerror="this.style.display='none'" />
    </div>
  </header>


<!-- Sepeda Unggulan Kami -->
  <section class="flex flex-col max-w-7xl mx-auto px-6 pb-16 w-full">
    <h2 class="text-center text-2xl lg:text-3xl font-bold mb-8">Sepeda Unggulan Kami</h2>

    <!-- Wrapper scroll + tombol -->
    <div class="relative">
      <!-- Tombol kiri -->
         <button id="scrollLeft" 
            class="absolute left-0 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center 
                bg-white text-black rounded-full shadow-md z-20 hover:shadow-lg transition text-xl font-bold">
            <span class="-translate-y-[2px] inline-block">&lt;</span>
         </button>

     <!-- Tombol kanan -->
         <button id="scrollRight" 
            class="absolute right-0 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center 
                bg-white text-black rounded-full shadow-md z-20 hover:shadow-lg transition text-xl font-bold">
            <span class="-translate-y-[2px] inline-block">&gt;</span>
         </button>


      <!-- Container scroll -->
      <div id="featuredBikes" class="flex overflow-x-auto gap-6 scrollbar-hide scroll-smooth">
        <!-- Card Sepeda 1 -->
        <div class="bg-white rounded-lg shadow-lg min-w-[250px] flex-shrink-0 flex flex-col">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/21b4b725-892b-4889-b99d-1a7926b6f7cb.png" class="rounded-t-lg h-40 w-full object-cover" />
          <div class="p-4 flex flex-col justify-between flex-grow">
            <h3 class="font-semibold text-lg mb-2">Sepeda Listrik Merah Klasik</h3>
            <p class="text-sm text-gray-700 flex-grow">Nyaman dan mudah dikendarai, cocok untuk di kota.</p>
            <p class="font-semibold pt-2">Rp 25.000 / jam</p>
            <button class="mt-4 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
          </div>
        </div>
        <!-- Card Sepeda 2 -->
        <div class="bg-white rounded-lg shadow-lg min-w-[250px] flex-shrink-0 flex flex-col">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bd220fad-8b89-49de-ae56-70d3e6e1f231.png" class="rounded-t-lg h-40 w-full object-cover" />
          <div class="p-4 flex flex-col justify-between flex-grow">
            <h3 class="font-semibold text-lg mb-2">Sepeda Listrik Merah Sporty</h3>
            <p class="text-sm text-gray-700 flex-grow">Cepat dan efisien, cocok untuk pelajar atau pekerja.</p>
            <p class="font-semibold pt-2">Rp 25.000 / jam</p>
            <button class="mt-4 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
          </div>
        </div>
        <!-- Card Sepeda 3 -->
        <div class="bg-white rounded-lg shadow-lg min-w-[250px] flex-shrink-0 flex flex-col">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/b0c4fe57-11a5-402e-a22b-19afc138a3ef.png" class="rounded-t-lg h-40 w-full object-cover" />
          <div class="p-4 flex flex-col justify-between flex-grow">
            <h3 class="font-semibold text-lg mb-2">Sepeda Listrik Hijau</h3>
            <p class="text-sm text-gray-700 flex-grow">Desain modern dan ringan, cocok untuk semua usia.</p>
            <p class="font-semibold pt-2">Rp 25.000 / jam</p>
            <button class="mt-4 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
          </div>
        </div>
        <!-- Card Sepeda 4 -->
        <div class="bg-white rounded-lg shadow-lg min-w-[250px] flex-shrink-0 flex flex-col">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2eacd471-324a-4a15-98bf-7028c7e313c0.png" class="rounded-t-lg h-40 w-full object-cover" />
          <div class="p-4 flex flex-col justify-between flex-grow">
            <h3 class="font-semibold text-lg mb-2">Sepeda Listrik Biru</h3>
            <p class="text-sm text-gray-700 flex-grow">Cocok untuk perjalanan santai dan kerja harian.</p>
            <p class="font-semibold pt-2">Rp 25.000 / jam</p>
            <button class="mt-4 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
          </div>
        </div>
        <!-- Card Sepeda 5 -->
        <div class="bg-white rounded-lg shadow-lg min-w-[250px] flex-shrink-0 flex flex-col">
          <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/61a4cf3c-e5ac-4828-ad55-5136a34a1d48.png" class="rounded-t-lg h-40 w-full object-cover" />
          <div class="p-4 flex flex-col justify-between flex-grow">
            <h3 class="font-semibold text-lg mb-2">Sepeda Listrik Kuning</h3>
            <p class="text-sm text-gray-700 flex-grow">Cocok untuk perjalanan santai dan kerja harian.</p>
            <p class="font-semibold pt-2">Rp 25.000 / jam</p>
            <button class="mt-4 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
          </div>
        </div>
      </div>

  </section>


<!-- Trending / Promo Section -->
<section class="flex flex-col max-w-7xl mx-auto px-6 pb-16 w-full mt-12">
  <div class="flex flex-col mb-6">
    <h2 class="text-2xl font-bold flex items-center gap-3">
      <span class="material-symbols-outlined text-4xl text-red-500" style="font-variation-settings: 'wght' 700, 'FILL' 1;">
        local_fire_department
      </span>
      TRENDING
    </h2>
    <p class="text-gray-500 mt-1">Pilihan sepeda terfavorit pekan ini!</p>
  </div>

  <div class="flex gap-8">
    <!-- Sepeda scroll horizontal -->
    <div class="flex overflow-x-auto gap-4 scrollbar-hide flex-1">
      <!-- Card Sepeda 1 -->
      <div class="bg-white rounded-lg shadow-lg flex-shrink-0 w-[28%] flex flex-col">
        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/21b4b725-892b-4889-b99d-1a7926b6f7cb.png" alt="Sepeda 1" class="rounded-t-lg object-cover h-36 w-full" />
        <div class="p-3 flex flex-col justify-between flex-grow">
          <h3 class="font-semibold text-lg mb-1">Sepeda Listrik Merah Klasik</h3>
          <p class="text-sm text-gray-700 flex-grow">Nyaman dan mudah dikendarai, cocok untuk di kota.</p>
          <p class="font-semibold pt-1">Rp 25.000 / jam</p>
          <button class="mt-3 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
        </div>
      </div>

      <!-- Card Sepeda 2 -->
      <div class="bg-white rounded-lg shadow-lg flex-shrink-0 w-[28%] flex flex-col">
        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bd220fad-8b89-49de-ae56-70d3e6e1f231.png" alt="Sepeda 2" class="rounded-t-lg object-cover h-36 w-full" />
        <div class="p-3 flex flex-col justify-between flex-grow">
          <h3 class="font-semibold text-lg mb-1">Sepeda Listrik Merah Sporty</h3>
          <p class="text-sm text-gray-700 flex-grow">Cepat dan efisien, cocok untuk pelajar atau pekerja.</p>
          <p class="font-semibold pt-1">Rp 25.000 / jam</p>
          <button class="mt-3 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
        </div>
      </div>

      <!-- Card Sepeda 3 -->
      <div class="bg-white rounded-lg shadow-lg flex-shrink-0 w-[28%] flex flex-col">
        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/b0c4fe57-11a5-402e-a22b-19afc138a3ef.png" alt="Sepeda 3" class="rounded-t-lg object-cover h-36 w-full" />
        <div class="p-3 flex flex-col justify-between flex-grow">
          <h3 class="font-semibold text-lg mb-1">Sepeda Listrik Hijau</h3>
          <p class="text-sm text-gray-700 flex-grow">Desain modern dan ringan, cocok untuk semua usia.</p>
          <p class="font-semibold pt-1">Rp 25.000 / jam</p>
          <button class="mt-3 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
        </div>
      </div>

      <!-- Card Sepeda 4 -->
      <div class="bg-white rounded-lg shadow-lg flex-shrink-0 w-[28%] flex flex-col">
        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2eacd471-324a-4a15-98bf-7028c7e313c0.png" alt="Sepeda 4" class="rounded-t-lg object-cover h-36 w-full" />
        <div class="p-3 flex flex-col justify-between flex-grow">
          <h3 class="font-semibold text-lg mb-1">Sepeda Listrik Biru</h3>
          <p class="text-sm text-gray-700 flex-grow">Cocok untuk perjalanan santai dan kerja harian.</p>
          <p class="font-semibold pt-1">Rp 25.000 / jam</p>
          <button class="mt-3 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition">Sewa Sekarang</button>
        </div>
      </div>
    </div>


<!-- Promo Box scroll vertikal -->
<div class="flex flex-col gap-4 flex-shrink-0 w-full lg:w-1/4 overflow-y-auto max-h-[360px]">
  <div class="bg-gray-200 p-4 rounded-lg flex-shrink-0">
    <h4 class="font-bold flex items-center gap-2 mb-2">🚴‍♂️ GowesYuk!</h4>
    <p class="text-sm">PROMO SPESIAL 12.12 Nikmati serunya bersepeda keliling kota tanpa ribet!</p>
  </div>
  <div class="bg-gray-200 p-4 rounded-lg flex-shrink-0">
    <h4 class="font-bold flex items-center gap-2 mb-2">🚴‍♂️ GowesYuk!</h4>
    <p class="text-sm"><span class="font-semibold">DISKON 50%</span> Untuk penyewaan sepeda pertama anda!</p>
  </div>
  <div class="bg-gray-200 p-4 rounded-lg flex-shrink-0">
    <h4 class="font-bold flex items-center gap-2 mb-2">🚴‍♂️ GowesYuk!</h4>
    <p class="text-sm"><span class="font-semibold">FREE HELM</span> Setiap penyewaan lebih dari 2 hari!</p>
  </div>
  <div class="bg-gray-200 p-4 rounded-lg flex-shrink-0">
    <h4 class="font-bold flex items-center gap-2 mb-2">🚴‍♂️ GowesYuk!</h4>
    <p class="text-sm"><span class="font-semibold">PAKET GROUP</span> Nikmati diskon untuk pemesanan lebih dari 5 sepeda!</p>
  </div>
  <div class="bg-gray-200 p-4 rounded-lg flex-shrink-0">
    <h4 class="font-bold flex items-center gap-2 mb-2">🚴‍♂️ GowesYuk!</h4>
    <p class="text-sm"><span class="font-semibold">EXTRA BATTERY</span> Gratis baterai tambahan untuk sepeda listrik!</p>
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
         <li><a href="tentang" class="hover:text-white transition">Tentang</a></li>
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

  
  <!-- JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Logout success popup
      if (localStorage.getItem('showLogoutSuccess') === 'true') {
        document.getElementById('successModal').style.display = 'flex';
        setTimeout(function() {
          document.getElementById('successModal').style.display = 'none';
          localStorage.removeItem('showLogoutSuccess');
        }, 1500);
      }

      // Tombol < dan > scroll
      const container = document.getElementById('featuredBikes');
      const scrollAmount = 300;
      document.getElementById('scrollLeft').addEventListener('click', () => {
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
      });
      document.getElementById('scrollRight').addEventListener('click', () => {
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
      });

      
    });
  </script>
</body>
</html>
