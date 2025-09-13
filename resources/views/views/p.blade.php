<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GowesYuk - Profil & Setting</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom scrollbar for sidebar */
    .sidebar::-webkit-scrollbar {
      width: 8px;
    }
    .sidebar::-webkit-scrollbar-thumb {
      background-color: #7c3aed; /* Indigo-600 */
      border-radius: 4px;
    }
    /* Transition for sidebar active menu */
    .menu-item.active {
      background-color: #ddd6fe; /* Tailwind indigo-200 */
      color: #5b21b6; /* Tailwind indigo-700 */
      font-weight: 600;
    }
    /* Hide file input */
    input[type="file"] {
      display: none;
    }
  </style>
</head>
<body class="bg-[#d6d6f5] flex flex-col min-h-screen">

  <!-- Header Navbar -->
   @include('navbar')

  <!-- Main Content -->
  <main class="flex flex-1 max-w-7xl mx-auto mt-6 mb-8 px-4 sm:px-6 lg:px-8 w-full min-h-[calc(100vh-104px)]">
    <!-- Sidebar -->
    <aside class="sidebar bg-white rounded-lg shadow-md w-72 p-6 flex flex-col space-y-8 overflow-y-auto sticky top-24 h-[calc(100vh-104px)]" aria-label="Sidebar menu">
      <div class="flex flex-col items-center space-y-4">
        <div class="relative w-24 h-24 rounded-full overflow-hidden bg-indigo-100 flex justify-center items-center border border-indigo-300">
          <img id="profile-picture" src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a39145be-edba-4525-aee0-6fd80520d4df.png" alt="Foto profil pengguna berbentuk lingkaran dengan latar belakang ungu muda dan ilustrasi ikon pengguna berwarna abu-abu gelap" class="object-cover w-full h-full" onerror="this.onerror=null;this.src='https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bef341ab-9618-434a-9b5c-aadd655f78dd.png';" />
        </div>
        <div class="text-center">
          <p id="sidebar-username" class="font-semibold text-indigo-900 text-lg select-text">Username</p>
          <p class="text-sm text-indigo-500 select-text">Ubah Profil</p>
        </div>
      </div>
      <nav class="flex flex-col space-y-2" aria-label="Navigasi menu profil">
        <button id="menu-profile" class="menu-item flex items-center px-3 py-2 rounded-md cursor-pointer text-indigo-500 active" aria-current="page" type="button">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
            <circle cx="12" cy="7" r="4" />
            <path d="M5.5 21a6.5 6.5 0 0113 0" />
          </svg>
          Profil
        </button>
        <button id="menu-orders" class="menu-item flex items-center px-3 py-2 rounded-md cursor-pointer hover:bg-indigo-100 text-indigo-900" type="button">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
            <path d="M9 17v-6a3 3 0 016 0v6" />
            <rect x="3" y="17" width="18" height="3" rx="1" />
          </svg>
          Pesanan Saya
        </button>
        <button id="menu-setting" class="menu-item flex items-center px-3 py-2 rounded-md cursor-pointer hover:bg-indigo-100 text-indigo-900" type="button">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
            <circle cx="12" cy="12" r="3" />
            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 005 15a1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09A1.65 1.65 0 005 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51h.09a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z" />
          </svg>
          Setting
        </button>
        <button id="menu-logout" class="menu-item flex items-center px-3 py-2 rounded-md cursor-pointer hover:bg-indigo-100 text-indigo-900" type="button">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" 
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
            <polyline points="16 17 21 12 16 7" />
            <line x1="21" y1="12" x2="9" y2="12" />
          </svg>
          Keluar
        </button>
      </nav>
    </aside>

    <!-- Content Area -->
    <section id="content-area" class="flex-1 ml-6 bg-white rounded-lg shadow-md p-8 overflow-y-auto max-h-[calc(100vh-104px)]">
      <!-- Profil form (default visible) -->
      <form id="profile-form" class="space-y-6 max-w-3xl" autocomplete="off" novalidate>
        <h2 class="text-2xl font-bold text-indigo-900 mb-4">Ubah Profil</h2>

        <div class="flex flex-col sm:flex-row sm:space-x-12">
          <div class="flex-grow space-y-4">
            <div>
              <label for="username" class="block text-indigo-800 font-semibold mb-1">Username</label>
              <input type="text" id="username" name="username" placeholder="Masukkan username" 
                class="input-field" autocomplete="username" required />
            </div>
            <div>
              <label for="password" class="block text-indigo-800 font-semibold mb-1">Password</label>
              <input type="password" id="password" name="password" placeholder="Masukkan password baru" 
                class="input-field" autocomplete="new-password" />
            </div>
            <div>
              <label for="fullname" class="block text-indigo-800 font-semibold mb-1">Nama Lengkap</label>
              <input type="text" id="fullname" name="fullname" placeholder="Masukkan nama lengkap" 
                class="input-field" autocomplete="name" />
            </div>
            <div>
              <label for="phone" class="block text-indigo-800 font-semibold mb-1">Nomor Telepon</label>
              <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon" 
                class="input-field" autocomplete="tel" pattern="[0-9+\- ]*" />
            </div>
            <div>
              <label for="email" class="block text-indigo-800 font-semibold mb-1">Email</label>
              <input type="email" id="email" name="email" placeholder="Masukkan email" 
                class="input-field" autocomplete="email" />
            </div>
            <button type="submit" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition mt-2">
              Simpan Perubahan
            </button>
          </div>
          
          <div class="mt-6 sm:mt-0 flex flex-col items-center w-40">
            <div class="relative w-32 h-32 rounded-full overflow-hidden bg-indigo-100 border border-indigo-300 flex justify-center items-center">
              <img id="profile-image-preview" src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/8e7aaad0-66de-4f58-9f0e-aaaa963d7881.png" alt="Pratinjau foto profil pengguna berbentuk lingkaran dengan latar belakang ungu muda dan ilustrasi ikon pengguna berwarna abu-abu gelap" 
                class="object-cover w-full h-full" onerror="this.onerror=null;this.src='https: //storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2e84553e-d384-46b5-b12b-b1f1fb004fd3.png';" />
            </div>
            <label for="profile-image-upload" 
              class="mt-4 inline-block cursor-pointer bg-indigo-700 text-white px-4 py-2 rounded-md text-center hover:bg-indigo-800 transition select-none"
              tabindex="0" role="button" aria-label="Pilih gambar profil">
              Pilih Gambar
            </label>
            <input type="file" accept="image/*" id="profile-image-upload" name="profile-image-upload" />
          </div>
        </div>
      </form>

      <!-- Pesanan Saya placeholder -->
      <section id="orders-section" hidden>
        <h2 class="text-2xl font-bold text-indigo-900 mb-4">Pesanan Saya</h2>
        <p class="text-indigo-700">Fitur Pesanan Saya akan segera hadir. Mohon bersabar.</p>
      </section>

      <!-- Setting page -->
      <section id="setting-section" hidden>
        <h2 class="text-2xl font-bold text-indigo-900 mb-4">Pengaturan</h2>
        <form id="setting-form" class="max-w-3xl space-y-4" autocomplete="off" novalidate>
          <div>
            <label for="notif-email" class="inline-flex items-center cursor-pointer">
              <input type="checkbox" id="notif-email" name="notif-email" class="mr-2 h-5 w-5 text-indigo-600 rounded border-indigo-300" />
              <span class="text-indigo-800 font-medium">Terima notifikasi email</span>
            </label>
          </div>
          <div>
            <label for="notif-sms" class="inline-flex items-center cursor-pointer">
              <input type="checkbox" id="notif-sms" name="notif-sms" class="mr-2 h-5 w-5 text-indigo-600 rounded border-indigo-300" />
              <span class="text-indigo-800 font-medium">Terima notifikasi SMS</span>
            </label>
          </div>
          <div>
            <label for="dark-mode" class="inline-flex items-center cursor-pointer">
              <input type="checkbox" id="dark-mode" name="dark-mode" class="mr-2 h-5 w-5 text-indigo-600 rounded border-indigo-300" />
              <span class="text-indigo-800 font-medium">Aktifkan mode gelap (dark mode)</span>
            </label>
          </div>
          <button type="submit" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition mt-4">
            Simpan Pengaturan
          </button>
        </form>
      </section>
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
    // Elements
    const menuProfile = document.getElementById('menu-profile');
    const menuOrders = document.getElementById('menu-orders');
    const menuSetting = document.getElementById('menu-setting');
    const menuLogout = document.getElementById('menu-logout');
    const contentArea = document.getElementById('content-area');
    const profileForm = document.getElementById('profile-form');
    const ordersSection = document.getElementById('orders-section');
    const settingSection = document.getElementById('setting-section');
    const profileImageUpload = document.getElementById('profile-image-upload');
    const profileImagePreview = document.getElementById('profile-image-preview');
    const profilePictureSidebar = document.getElementById('profile-picture');
    const sidebarUsername = document.getElementById('sidebar-username');
    const usernameInput = document.getElementById('username');

    // Helper: clear active menu highlights
    function clearActiveMenu() {
      document.querySelectorAll('.menu-item').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.remove('text-indigo-700', 'font-semibold');
        btn.classList.add('text-indigo-900');
      });
    }

    // Menu click handlers
    menuProfile.addEventListener('click', () => {
      clearActiveMenu();
      menuProfile.classList.add('active', 'text-indigo-700', 'font-semibold');
      showSection('profile');
    });
    menuOrders.addEventListener('click', () => {
      clearActiveMenu();
      menuOrders.classList.add('active', 'text-indigo-700', 'font-semibold');
      showSection('orders');
    });
    menuSetting.addEventListener('click', () => {
      clearActiveMenu();
      menuSetting.classList.add('active', 'text-indigo-700', 'font-semibold');
      showSection('setting');
    });
    menuLogout.addEventListener('click', () => {
      alert('Anda telah keluar.');
      // Here you might want to redirect or clear user data
    });

    // Show and hide sections based on menu
    function showSection(sectionName) {
      if (sectionName === 'profile') {
        profileForm.hidden = false;
        ordersSection.hidden = true;
        settingSection.hidden = true;
      } else if (sectionName === 'orders') {
        profileForm.hidden = true;
        ordersSection.hidden = false;
        settingSection.hidden = true;
      } else if (sectionName === 'setting') {
        profileForm.hidden = true;
        ordersSection.hidden = true;
        settingSection.hidden = false;
      }
    }

    // Image upload preview
    profileImageUpload.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (!file) return;
      if (!file.type.startsWith('image/')) {
        alert('Harap pilih file gambar yang valid.');
        return;
      }

      const reader = new FileReader();
      reader.onload = () => {
        profileImagePreview.src = reader.result;
        profilePictureSidebar.src = reader.result;
      };
      reader.readAsDataURL(file);
    });

    // Handle profile form submit
    profileForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Simple client-side validation (could be improved)
      const username = usernameInput.value.trim();
      if (!username) {
        alert('Username tidak boleh kosong!');
        usernameInput.focus();
        return;
      }
      // For demo: just update the username in sidebar
      sidebarUsername.textContent = username;

      alert('Profil berhasil disimpan!');
    });

    // Handle setting form submit
    const settingForm = document.getElementById('setting-form');
    settingForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Pengaturan berhasil disimpan!');
    });

    // Accessibility enhancements: allow Enter/Space on profile picture label for keyboard users
    const labelImage = document.querySelector('label[for="profile-image-upload"]');
    labelImage.addEventListener('keydown', e => {
      if(e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        profileImageUpload.click();
      }
    });

    // Initially show profile form
    showSection('profile');
  </script>

  <style>
    /* Input fields style */
    .input-field {
      width: 100%;
      padding: 0.5rem 0.75rem;
      border: 1.5px solid #ddd6fe; /* Tailwind indigo-200 */
      border-radius: 0.375rem;
      font-size: 1rem;
      color: #4b5563; /* Tailwind gray-700 */
      outline-offset: 2px;
      outline-color: transparent;
      transition: border-color 0.2s ease-in-out, outline-color 0.2s ease-in-out;
    }
    .input-field:focus {
      border-color: #6366f1; /* Tailwind indigo-500 */
      outline-color: #a5b4fc; /* Tailwind indigo-300 */
      outline-style: solid;
      outline-width: 2px;
      background-color: #fff;
    }
  </style>
</body>
</html>

