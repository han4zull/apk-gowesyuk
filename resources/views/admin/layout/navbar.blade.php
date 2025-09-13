<head>
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>

<!-- Navbar -->
<nav id="main-navbar" class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50 transition-transform duration-300">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/gowesyuk1.png') }}" alt="Logo GowesYuk" class="w-19 h-10" />
        <span class="text-xl font-bold text-gray-800">GowesYuk</span>
    </div>

    <div class="flex items-center space-x-6 justify-center flex-1">
        <!-- Beranda -->
        <a href="{{ route('admin.beranda_admin') }}"
           class="{{ Route::is('admin.beranda_admin') 
                ? 'px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Beranda
        </a>

        <!-- Kelola Sepeda -->
        <a href="{{ route('admin.kelola_sepeda') }}"
           class="{{ Route::is('admin.kelola_sepeda') 
                ? 'px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Kelola Sepeda
        </a>

        <!-- Kelola Pengguna -->
        <a href="{{ route('admin.pengguna_sepeda') }}"
           class="{{ Route::is('admin.pengguna_sepeda') 
                ? 'px-3 py-2 rounded-md bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Kelola Pengguna
        </a>

        <!-- Kelola Penyewaan -->
        <a href="{{ route('admin.penyewaan_sepeda') }}"
           class="{{ Route::is('admin.penyewaan_sepeda') 
                ? 'px-3 py-2 rounded-md bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Kelola Penyewaan
        </a>

        <!-- Laporan -->
        <a href="{{ route('admin.laporan.index') }}"
           class="{{ Route::is('admin.laporan.*') 
                ? 'px-3 py-2 rounded-md bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Laporan
        </a>
    </div>

    <div class="flex items-center space-x-3">
        {{-- Kalau belum login --}}
        @guest
            <a href="{{ url('masuk') }}" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Masuk</a>
            <a href="{{ url('daftar') }}" class="bg-black text-white rounded-full px-4 py-1 font-semibold text-sm hover:bg-gray-900 transition">Daftar</a>
        @endguest

        {{-- Kalau sudah login --}}
        @auth
        <div class="relative">
          <button id="profileButton" class="flex items-center focus:outline-none">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" 
                 class="w-9 h-9 rounded-full cursor-pointer" 
                 alt="Profile">
            </button>
        </div>
        @endauth
    </div>
</nav>


<!-- Logout Modal -->
<div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center transition-opacity duration-300">
  <!-- Modal box -->
  <div class="bg-white rounded-2xl shadow-2xl p-6 w-[90%] max-w-md text-center transform scale-95 opacity-0 transition-all duration-300" id="logoutBox">
    <!-- Icon -->
    <div class="mx-auto flex items-center justify-end w-16 h-16 rounded-full bg-red-100 mb-4 pr-[0.875rem]">
      <i class="bx bx-log-out text-red-600 text-3xl rotate-180"></i> <!-- rotate 90° agar arrow menghadap kanan -->
    </div>

    <!-- Title -->
    <h3 class="text-xl font-semibold text-gray-800 mb-2">Yakin ingin keluar?</h3>
    <p class="text-gray-500 mb-6">Jika keluar, Anda harus masuk kembali untuk mengakses beranda.</p>

    <!-- Buttons -->
    <div class="flex justify-center gap-4">
      <button id="cancelLogout" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-800 font-medium hover:bg-gray-300 transition">
        Batal
      </button>
      <button id="confirmLogout" class="px-5 py-2 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 transition">
        Keluar
      </button>
    </div>
  </div>
</div>


<!-- Form logout -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

<script src="{{ asset('js/admin/layout/navbar.js') }}"></script>
