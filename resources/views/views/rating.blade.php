<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GowesYuk - Rating</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="bg-[#E6E6FA] flex flex-col min-h-screen">

  <!-- Navbar -->
<nav class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50">
  <div class="flex items-center space-x-3">
    <img src="images/gowesyuk1.png" alt="Logo GowesYuk" class="w-19 h-10" />
    <span class="text-xl font-bold text-gray-800">GowesYuk</span>
  </div>
  <div class="flex items-center space-x-6 justify-center flex-1">
    <a href="landing_page" class="block px-3 py-2 rounded-md hover:bg-gray-100">Beranda</a>
    <a href="sewa_sepeda" class="block px-3 py-2 rounded-md hover:bg-gray-100">Sewa Sepeda</a>
    <a href="tentang" class="block px-3 py-2 rounded-md hover:bg-gray-100">Tentang</a>
    <a href="rating" class="px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm">Rating</a>
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

  <!-- Section Rating -->
  <section class="flex flex-col items-center py-12 px-6 bg-[#E6E6FA] flex-1">
    <h2 class="text-3xl font-semibold mb-2">Apa Kata Pelanggan Kami</h2>
    <p class="text-gray-400 mb-8">Ribuan pelanggan telah mempercayai layanan rental sepeda kami</p>

    <!-- Card Reviews -->
    <div class="flex flex-col md:flex-row gap-6 max-w-6xl w-full justify-center">
      <!-- Card 1 -->
      <div class="bg-white rounded-xl p-6 shadow-md flex-1">
        <div class="text-yellow-500 mb-2">
          ★★★★☆
        </div>
        <p class="italic mb-4">“GowesYuk sangat membantu untuk mobilitas harian saya. Sepedanya berkualitas dan pelayanannya memuaskan!”</p>
        <div class="flex items-center gap-3">
          <span class="material-icons text-gray-400">account_circle</span>
          <div>
            <p class="font-semibold">Sarah Wijaya</p>
            <p class="text-sm text-gray-500">Mahasiswa</p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-xl p-6 shadow-md flex-1">
        <div class="text-yellow-500 mb-2">
          ★★★★☆
        </div>
        <p class="italic mb-4">“GowesYuk sangat membantu untuk mobilitas harian saya. Sepedanya berkualitas dan pelayanannya memuaskan!”</p>
        <div class="flex items-center gap-3">
          <span class="material-icons text-gray-400">account_circle</span>
          <div>
            <p class="font-semibold">Sarah Wijaya</p>
            <p class="text-sm text-gray-500">Mahasiswa</p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-xl p-6 shadow-md flex-1">
        <div class="text-yellow-500 mb-2">
          ★★★★☆
        </div>
        <p class="italic mb-4">“GowesYuk sangat membantu untuk mobilitas harian saya. Sepedanya berkualitas dan pelayanannya memuaskan!”</p>
        <div class="flex items-center gap-3">
          <span class="material-icons text-gray-400">account_circle</span>
          <div>
            <p class="font-semibold">Sarah Wijaya</p>
            <p class="text-sm text-gray-500">Mahasiswa</p>
          </div>
        </div>
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

</body>
</html>
