<!-- Navbar CSS & JS -->
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<script src="{{ asset('js/navbar.js') }}"></script>
<nav id="main-navbar" class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50 transition-transform duration-300">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/gowesyuk1.png') }}" alt="Logo GowesYuk" class="w-19 h-10" />
        <span class="text-xl font-bold text-gray-800">GowesYuk</span>
    </div>
    <div class="flex items-center space-x-6 justify-center flex-1">
        <a href="#" class="px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm" aria-current="page">Beranda</a>
        <a href="#" class="block px-3 py-2 rounded-md hover:bg-gray-100">Sewa Sepeda</a>
        <a href="about" class="block px-3 py-2 rounded-md hover:bg-gray-100">Tentang</a>
        <a href="#" class="block px-3 py-2 rounded-md hover:bg-gray-100">Rating</a>
    </div>
    <div class="flex items-center space-x-3">
        <a href="#" class="text-gray-600 hover:text-gray-900 font-medium text-sm">Masuk</a>
        <a href="#" class="bg-black text-white rounded-full px-4 py-1 font-semibold text-sm hover:bg-gray-900 transition">Daftar</a>
    </div>
</nav>
