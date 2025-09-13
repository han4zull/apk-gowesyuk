<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GowesYuk</title>
    <!-- Tailwind CSS CDN -->
    <link rel="stylesheet" href="{{ asset('css/profilecss.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src=""></script>

</head>
<body class="bg-[#d6d6f5] flex flex-col min-h-screen">
    
    <!-- Navbar -->
<nav id="main-navbar" class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50 transition-transform duration-300">
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/gowesyuk1.png') }}" alt="Logo GowesYuk" class="w-19 h-10" />
        <span class="text-xl font-bold text-gray-800">GowesYuk</span>
    </div>

    <div class="flex items-center space-x-6 justify-center flex-1">
        <a href="{{ url('landing_page') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Beranda</a>
        <a href="{{ url('sewa_sepeda') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Sewa Sepeda</a>
        <a href="{{ url('about') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Tentang</a>
        <a href="{{ url('rating') }}" class="block px-3 py-2 rounded-md hover:bg-gray-100">Rating</a>
    </div>

    <div class="flex items-center space-x-3">
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

    <!-- Main Content Area -->
    <main class="flex flex-1 flex-col md:flex-row p-4 md:space-x-4">
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-white rounded-lg shadow-md p-6 mb-4 md:mb-0 flex-shrink-0">
            <div class="flex flex-col items-center space-y-4">
        <div class="relative w-24 h-24 rounded-full overflow-hidden bg-indigo-100 flex justify-center items-center border border-indigo-300">
          <img id="profile-picture" src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a39145be-edba-4525-aee0-6fd80520d4df.png" alt="Foto profil pengguna berbentuk lingkaran dengan latar belakang ungu muda dan ilustrasi ikon pengguna berwarna abu-abu gelap" class="object-cover w-full h-full" onerror="this.onerror=null;this.src='https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bef341ab-9618-434a-9b5c-aadd655f78dd.png';" />
        </div>
        <div class="text-center">
          <p id="sidebar-username" class="font-semibold text-indigo-900 text-lg select-text">Username</p>
          <p class="text-sm text-indigo-500 select-text">Ubah Profil</p>
        </div>
      </div>

            <nav class="space-y-3">
                <a href="#" id="profile-link" class="sidebar-link active flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    <!-- Profile icon SVG -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profil</span>
                </a>

                <a href="#" id="my-orders-link" class="sidebar-link flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    <!-- Orders icon SVG -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <span>Pesanan Saya</span>
                </a>

                <a href="#" id="settings-link" class="sidebar-link flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    <!-- Settings icon SVG -->
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                      stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                      <circle cx="12" cy="12" r="3" />
                      <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 005 15a1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09A1.65 1.65 0 005 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51h.09a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z" />
                    </svg>
                    <span>Setting</span>
                </a>
                
                
                <a href="#" id="logout-link" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    <!-- Logout icon SVG -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Keluar</span>
                </a>
                
            </nav>
        </aside>

        <!-- Main Content (Dynamic) -->
        <section id="content-area" class="flex-1 bg-white rounded-lg shadow-md p-6">
            <!-- Profile content will be loaded here by default -->
            <div id="profile-content">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ubah Profil</h2>
                <form id="edit-profile-form" class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                    <div>
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" id="username" name="username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" value="Username">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" placeholder="Password baru">
                        </div>
                        <div class="mb-4">
                            <label for="full-name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="full-name" name="full-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" value="">
                        </div>
                        <div class="mb-4">
                            <label for="phone-number" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="tel" id="phone-number" name="phone-number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" value="">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" value="">
                        </div>
                        <button type="submit" class="mt-4 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">Simpan Perubahan</button>
                    </div>
                    <div class="flex flex-col items-center justify-center space-y-4 md:mt-0 mt-6">
                        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                            <!-- User avatar icon SVG or actual image -->
                            <svg class="w-20 h-20 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <button class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">Pilih Gambar</button>
                    </div>
                </form>
            </div>

            <!-- My Orders content (hidden by default) -->
            <div id="my-orders-content" class="hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Pesanan Saya</h2>
                <div class="bg-white rounded-lg p-4 shadow-md flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-4 mb-4">
                    <img src="https://placehold.co/150x100/A0A0FF/FFFFFF?text=Sepeda" alt="Sepeda Listrik Edison Espira" class="w-32 h-24 object-cover rounded-md flex-shrink-0">
                    <div class="flex-1 text-center md:text-left">
                        <p class="font-semibold text-lg text-gray-800">Sepeda Listrik Edison Espira</p>
                        <p class="text-indigo-600 font-bold">Rp 25.000</p>
                    </div>
                    <div class="flex flex-col items-center md:items-end md:ml-auto">
                        <p class="text-gray-600">Total 1 Produk:</p>
                        <p class="text-xl font-bold text-gray-800">Rp 27.500</p>
                        <button class="mt-2 px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-200">Penyewaan Selesai</button>
                    </div>
                </div>
                <!-- Add more order items here if needed -->
            </div>

                <!-- Settings content (hidden by default) -->
                <div id="settings-content" class="hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan Akun</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                        <div>
                            <div class="mb-4">
                                <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Bahasa</label>
                                <select id="language" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                                    <option value="id">Indonesia</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="theme" class="block text-sm font-medium text-gray-700 mb-1">Tema</label>
                                <select id="theme" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                                    <option value="light">Terang</option>
                                    <option value="dark">Gelap</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="notification" class="block text-sm font-medium text-gray-700 mb-1">Notifikasi</label>
                                <input type="checkbox" id="notification" class="mr-2"> Aktifkan Notifikasi
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="privacy" class="block text-sm font-medium text-gray-700 mb-1">Privasi Akun</label>
                                <select id="privacy" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                                    <option value="public">Publik</option>
                                    <option value="private">Privat</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="change-password" class="block text-sm font-medium text-gray-700 mb-1">Ubah Password</label>
                                <input type="password" id="change-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" placeholder="Password baru">
                            </div>
                            <div class="mb-4">
                                <button class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">Simpan Pengaturan</button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 p-8 mt-auto">
    <!-- Popup Konfirmasi Logout -->
    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center max-w-sm w-full">
            <h2 class="text-xl font-bold mb-4">Yakin ingin keluar?</h2>
            <div class="flex justify-center gap-6 mt-6">
                <button id="confirmLogout" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 font-semibold">Iya</button>
                <button id="cancelLogout" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 font-semibold">Tidak</button>
            </div>
        </div>
    </div>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="mb-6 md:mb-0">
                <div class="flex items-center space-x-2 mb-2">
                    <!-- Bicycle icon SVG for footer -->
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15V9m0 0a2 2 0 012-2h4a2 2 0 012 2m-6 0v6m0-6h6m0-6v6m0-6l2 2m-2-2h2m0 0l2 2M15 9h5a2 2 0 012 2v4a2 2 0 01-2 2h-5m-5-6h6m-6 0l-2-2m2 2l-2 2"></path>
                    </svg>
                    <span class="text-lg font-bold text-white">GowesYuk</span>
                </div>
                <p class="text-sm">Solusi rental sepeda terpercaya untuk mobilitas modern di Seluruh Indonesia. Nikmati perjalanan yang ramah lingkungan dan sehat.</p>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-3">Link Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white">Cara Kerja</a></li>
                    <li><a href="#" class="hover:text-white">Harga</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-3">Kontak</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center space-x-2">
                        <!-- Phone icon SVG -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+62 123 4567 8910</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <!-- Email icon SVG -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 6h.01M3 8V6a2 2 0 012-2h14a2 2 0 012 2v2M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 6h.01"></path>
                        </svg>
                        <span>info@gowesyuk.id</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <!-- Location icon SVG -->
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Bogor, Indonesia</span>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        // Fitur edit profil sederhana
        document.getElementById('edit-profile-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Ambil data dari form
            const username = document.getElementById('username').value;
            const fullName = document.getElementById('full-name').value;
            const phone = document.getElementById('phone-number').value;
            const email = document.getElementById('email').value;
            // Tampilkan data di sidebar (simulasi update)
            document.getElementById('sidebar-username').textContent = username;
            alert('Profil berhasil diperbarui!');
        });
        
        // Logout popup logic
        const logoutLink = document.getElementById('logout-link');
        const logoutModal = document.getElementById('logoutModal');
        const confirmLogout = document.getElementById('confirmLogout');
        const cancelLogout = document.getElementById('cancelLogout');

        logoutLink.addEventListener('click', function(event) {
            event.preventDefault();
            logoutModal.style.display = 'flex';
        });

        confirmLogout.addEventListener('click', function() {
         // Simpan status logout di localStorage (opsional)
         localStorage.setItem('showLogoutSuccess', 'true');

         // Submit form logout ke Laravel
         document.getElementById('logout-form').submit();
        });


        cancelLogout.addEventListener('click', function() {
            logoutModal.style.display = 'none';
        });


        // Get references to the sidebar links and content areas
        const profileLink = document.getElementById('profile-link');
        const myOrdersLink = document.getElementById('my-orders-link');
        const settingsLink = document.getElementById('settings-link');
        const profileContent = document.getElementById('profile-content');
        const myOrdersContent = document.getElementById('my-orders-content');
        const settingsContent = document.getElementById('settings-content');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        // Function to show profile content and hide others
        function showProfile() {
            profileContent.classList.remove('hidden');
            myOrdersContent.classList.add('hidden');
            settingsContent.classList.add('hidden');
            profileLink.classList.add('active');
            myOrdersLink.classList.remove('active');
            settingsLink.classList.remove('active');
        }

        // Function to show my orders content and hide others
        function showMyOrders() {
            myOrdersContent.classList.remove('hidden');
            profileContent.classList.add('hidden');
            settingsContent.classList.add('hidden');
            myOrdersLink.classList.add('active');
            profileLink.classList.remove('active');
            settingsLink.classList.remove('active');
        }

        // Function to show settings content and hide others
        function showSettings() {
            settingsContent.classList.remove('hidden');
            profileContent.classList.add('hidden');
            myOrdersContent.classList.add('hidden');
            settingsLink.classList.add('active');
            profileLink.classList.remove('active');
            myOrdersLink.classList.remove('active');
        }

        // Add event listeners to the sidebar links
        profileLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            showProfile();
        });

        myOrdersLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            showMyOrders();
        });

        settingsLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            showSettings();
        });

        // Toggle mobile menu visibility
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Show profile content by default when the page loads
        document.addEventListener('DOMContentLoaded', showProfile);
    </script>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
       @csrf
    </form>
</body>
</html>