<!-- Navbar -->
<nav id="main-navbar" class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50 transition-transform duration-300">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/gowesyuk1.png') }}" alt="Logo GowesYuk" class="w-19 h-10" />
        <span class="text-xl font-bold text-gray-800">GowesYuk</span>
    </div>

    <div class="flex items-center space-x-6 justify-center flex-1">
        <!-- Beranda -->
        <a href="{{ route('user.landing_page') }}"
           class="{{ request()->routeIs('user.landing_page') 
                ? 'px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Beranda
        </a>

        <!-- Sewa Sepeda -->
        <a href="{{ route('user.sewa_sepeda') }}"
            class="{{ request()->routeIs('user.sewa_sepeda') 
                  ? 'px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm' 
                  : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
            Sewa Sepeda
        </a>

        <!-- Tentang -->
        <a href="{{ route('user.tentang') }}"
           class="{{ request()->routeIs('user.tentang') 
                ? 'px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Tentang
        </a>

        <!-- Rating -->
        <a href="{{ route('user.rating') }}"
           class="{{ request()->routeIs('user.rating') 
                ? 'px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm' 
                : 'block px-3 py-1 rounded-md hover:bg-gray-100' }}">
           Rating
        </a>

    </div>

    <div class="flex items-center space-x-3">
    {{-- Kalau belum login --}}
    @guest
        <a href="{{ url('masuk') }}" 
           class="text-gray-600 hover:text-gray-900 font-medium text-sm">
           Masuk
        </a>
        <a href="{{ url('daftar') }}" 
           class="bg-black text-white rounded-full px-4 py-1 font-semibold text-sm hover:bg-gray-900 transition">
           Daftar
        </a>
    @endguest

    {{-- Kalau sudah login --}}
    @auth
    <div class="flex items-center space-x-5">
        <!-- Icon Keranjang -->
        <a href="{{ route('user.keranjang') }}" 
           class="text-gray-600 hover:text-gray-900 transition transform hover:scale-110 flex items-center mt-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4"/>
          </svg>
        </a>

        <!-- Foto profil -->
<a href="{{ route('user.profile') }}" class="block">
    @if (Auth::user()->avatar)
        <img id="avatar-preview"
             src="{{ asset(Auth::user()->avatar) }}"
             alt="Avatar"
             class="object-cover w-9 h-9 rounded-full border border-gray-300 hover:ring-2 hover:ring-gray-400 transition cursor-pointer">
    @else
        <div class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-700 text-white font-semibold cursor-pointer">
            {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1)) }}
        </div>
    @endif
</a>

    </div>
    @endauth
</div>

</nav>