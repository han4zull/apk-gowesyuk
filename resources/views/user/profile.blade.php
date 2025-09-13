<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GowesYuk</title>
    <link rel="stylesheet" href="{{ asset('css/user/profilecss.cs') }}">
    <script src="{{ asset('js/user/profile.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-[#d6d6f5] flex flex-col min-h-screen">

<!-- Navbar -->
@include('user.layout.navbar')

<main class="flex flex-1 flex-col md:flex-row p-4 md:space-x-4">

    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white rounded-lg shadow-md p-6 mb-4 md:mb-0 flex-shrink-0">
        <div class="flex flex-col items-center space-y-4">
            <div class="relative w-24 h-24 rounded-full overflow-hidden bg-indigo-100 flex justify-center items-center border border-indigo-300">
                <img id="profile-picture"
                    src="{{ $user->avatar ?? 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bef341ab-9618-434a-9b5c-aadd655f78dd.png' }}"
                    alt="Foto profil pengguna"
                    class="object-cover w-full h-full rounded-full"
                    onerror="this.onerror=null;this.src='https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bef341ab-9618-434a-9b5c-aadd655f78dd.png';" />
            </div>
            <div class="text-center">
                <p id="sidebar-username" class="font-semibold text-indigo-900 text-lg select-text">
                    {{ $user->name }}
                </p>
                <p class="text-sm text-indigo-500 select-text">Ubah Profil</p>
            </div>
        </div>

        <nav class="space-y-3">
            <a href="#" id="profile-link" class="sidebar-link active flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Profil</span>
            </a>

            <a href="#" id="my-orders-link" class="sidebar-link flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span>Pesanan Saya</span>
            </a>

            <a href="#" id="settings-link" class="sidebar-link flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 005 15a1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09A1.65 1.65 0 005 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51h.09a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z" />
                </svg>
                <span>Setting</span>
            </a>

            <a href="#" id="logout-link" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Keluar</span>
            </a>
        </nav>
    </aside>

    <!-- Content Area -->
    <section id="content-area" class="flex-1 bg-white rounded-lg shadow-md p-6">

        <!-- Profile Form -->
        <div id="profile-content">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ubah Profil</h2>

            @if(session('success'))
                <p class="text-green-600 font-semibold mb-4">{{ session('success') }}</p>
            @endif

            @if($errors->any())
                <ul class="text-red-600 mb-4">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form id="edit-profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
    @csrf
    <div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
        </div>
        <div class="mb-4">
            <label for="full-name-settings" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" id="full-name-settings" name="full_name" value="{{ $user->full_name ?? '' }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
            <input type="tel" id="phone" name="phone" value="{{ $user->phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-black text-white rounded-md shadow-md hover:bg-gray-900">Simpan Perubahan</button>
    </div>

    <div class="flex flex-col items-center justify-center space-y-2 md:mt-0 mt-6">
    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
        <img id="avatar-preview"
             src="{{ $user->avatar ? asset($user->avatar) : 'https://storage.googleapis.com/.../default.png' }}"
             alt="Avatar"
             class="object-cover w-full h-full rounded-full">
    </div>
    <!-- Tombol custom di bawah avatar -->
    <label for="avatar" class="px-4 py-2 bg-indigo-600 text-white rounded-md cursor-pointer hover:bg-indigo-700 shadow-md text-sm">
        Pilih Foto
    </label>
    <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*" onchange="previewAvatar(event)">
</div>
</form>
        </div>
        

        <!-- My Orders -->
        <div id="my-orders-content" class="hidden">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Pesanan Saya</h2>
            @forelse($penyewaan as $order)
                <div class="bg-white rounded-lg p-4 shadow-md flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-4 mb-4">
                   <img class="w-24 h-24 object-cover rounded-lg"
     src="{{ $order->sepeda->gambar_sepeda ? asset('storage/sepeda/' . $order->sepeda->gambar_sepeda) : 'https://storage.googleapis.com/.../default-bike.png' }}"
     alt="{{ $order->nama_sepeda }}">

                    <div class="flex-1 text-center md:text-left">
                        <p class="font-semibold text-lg text-gray-800">{{ $order->nama_sepeda }}</p>
                        @if($order->durasi_jam > 0)
                            <p class="text-indigo-600 font-bold">
                                Rp {{ number_format($order->harga_jam) }} 
                            </p>
                            <p class="text-gray-600">Durasi: {{ $order->durasi_jam }} Jam</p>
                        @else
                            <p class="text-indigo-600 font-bold">
                                Rp {{ number_format($order->harga_hari) }}
                            </p>
                             <p class="text-gray-600">Durasi: {{ $order->durasi_hari }} Hari</p>
                        @endif
                    </div>
<div class="flex flex-col items-center md:items-end md:ml-auto relative w-full md:w-auto">
    <p class="text-xl font-bold text-gray-800 mb-2">Rp {{ number_format($order->total) }}</p>

    @if($order->status === 'proses')
            <div class="flex justify-end space-x-2">
                <button type="button"
                    class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow hover:bg-green-600"
                    onclick="openCompleteModal({{ $order->id_penyewaan }})">
                    Selesai
                </button>
                <button type="button"
                    class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700"
                    onclick="openCancelModal({{ $order->id_penyewaan }})">
                    Batalkan
                </button>
            </div>
        @elseif($order->status === 'selesai')
            <span class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">
                Penyewaan selesai
            </span>
        @elseif($order->status === 'batal')
            <span class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">
                Penyewaan dibatalkan
            </span>
    @endif
</div>


<!-- ================= MODAL BATALKAN ================= -->
<div id="cancelModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-2xl shadow-2xl p-6 w-[90%] max-w-md text-center">
    <h3 class="text-xl font-semibold text-gray-800 mb-2">Yakin ingin membatalkan pesanan?</h3>
    <p class="text-gray-500 mb-6">Jika dibatalkan, pesanan tidak bisa dikembalikan.</p>
    <div class="flex justify-center gap-4">
      <button onclick="closeCancelModal()"
        class="px-5 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300">Batal</button>

      <form id="cancelForm" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit"
          class="px-5 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">Ya, Batalkan</button>
      </form>
    </div>
  </div>
</div>

<!-- ================= MODAL SELESAI ================= -->
<div id="completeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-2xl shadow-2xl p-6 w-[90%] max-w-md text-center">
    <h3 class="text-xl font-semibold text-gray-800 mb-2">Yakin ingin menandai pesanan selesai?</h3>
    <p class="text-gray-500 mb-6">Setelah diselesaikan, pesanan akan dianggap selesai.</p>
    <div class="flex justify-center gap-4">
      <button onclick="closeCompleteModal()"
        class="px-5 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300">Batal</button>

      <form id="completeForm" method="POST" class="inline-block">
        @csrf
        <button type="submit"
          class="px-5 py-2 rounded-lg bg-green-500 text-white hover:bg-green-600">Ya, Selesai</button>
      </form>
    </div>
  </div>
</div>


                </div>
            @empty
                <div class="flex flex-col items-center justify-center py-16 bg-gray-100 rounded-lg shadow-md">
                    <i class="bx bx-bicycle text-6xl text-gray-400 mb-4"></i>
                    <p class="text-gray-500 text-lg font-medium">Belum ada pesanan.</p>
                    <p class="text-gray-400 text-sm">Ayo mulai sewa sepeda pertama Anda!</p>
                </div>
            @endforelse
        </div>

        <!-- Settings Content -->
        <div id="settings-content" class="hidden">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan Akun</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                <!-- Left: Email & Password -->
                <div class="flex flex-col gap-6">
                    <!-- Email Form -->
                    <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-sm">
                        <form method="POST" action="{{ route('email.update') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                            </div>
                            <button type="submit" class="px-4 py-2 bg-black text-white font-semibold rounded-md shadow-md hover:bg-gray-900">Ubah Email</button>
                        </form>
                    </div>

                    <!-- Password Form -->
                    <div class="bg-white border border-gray-300 rounded-lg p-6 shadow-sm">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="current-password" class="block text-sm font-medium text-gray-700 mb-1">Password Lama</label>
                                <input type="password" id="current-password" name="current_password" placeholder="Password lama" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                            </div>
                            <div class="mb-4">
                                <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                                <input type="password" id="new-password" name="new_password" placeholder="Password baru" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                            </div>
                            <div class="mb-4">
                                <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                                <input type="password" id="confirm-password" name="new_password_confirmation" placeholder="Konfirmasi password baru" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                            </div>
                            <button type="submit" class="px-4 py-2 bg-black text-white font-semibold rounded-md shadow-md hover:bg-gray-900">Ubah Password</button>
                        </form>
                    </div>
                </div>

            <!-- Right: Report Issue -->
<div class="bg-white border border-gray-300 rounded-lg p-6 shadow-sm h-full flex flex-col">
    <form method="POST" action="{{ route('user.report') }}" class="flex flex-col h-full space-y-4">
        @csrf

        <!-- Pilih Pesanan -->
        <div>
            <label for="penyewaan_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Pesanan</label>
            <select id="penyewaan_id" name="penyewaan_id" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                <option value="">Pilih pesanan...</option>
                @foreach($penyewaan as $order)
                    <option value="{{ $order->id_penyewaan }}">
                        {{ $order->nama_sepeda }} - {{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Judul Laporan -->
        <div>
            <label for="report-title" class="block text-sm font-medium text-gray-700 mb-1">Judul Laporan</label>
            <input type="text" id="report-title" name="report_title" placeholder="Masukkan judul laporan..." required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
        </div>

        <!-- Kategori Masalah -->
        <div>
            <label for="report-category" class="block text-sm font-medium text-gray-700 mb-1">Kategori Masalah</label>
            <select id="report-category" name="report_category" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
                <option value="">Pilih kategori...</option>
                <option value="teknis">Teknis</option>
                <option value="pelayanan">Pelayanan</option>
                <option value="pembayaran">Pembayaran</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <!-- Rating Bintang -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
            <div class="flex space-x-1">
                @for ($i = 1; $i <= 5; $i++)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required class="hidden">
                    <label for="star{{ $i }}" class="cursor-pointer text-gray-300 hover:text-yellow-400 text-2xl">&#9733;</label>
                @endfor
            </div>
        </div>

        <!-- Deskripsi Masalah -->
        <div class="flex-1">
            <label for="deskripsi_masalah" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Masalah</label>
            <textarea id="deskripsi_masalah" name="deskripsi_masalah" rows="7" placeholder="Jelaskan masalah yang Anda alami..." required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2"></textarea>
        </div>

        <!-- Submit -->
        <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow-md hover:bg-red-700">
            Kirim Laporan
        </button>
    </form>
</div>



            </div>
        </div>

    </section>
</main>

<!-- Logout Modal -->
<div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center transition-opacity duration-300">
  <div class="bg-white rounded-2xl shadow-2xl p-6 w-[90%] max-w-md text-center transform scale-95 opacity-0 transition-all duration-300" id="logoutBox">
    <div class="mx-auto flex items-center justify-end w-16 h-16 rounded-full bg-red-100 mb-4 pr-[0.875rem]">
      <i class="bx bx-log-out text-red-600 text-3xl rotate-180"></i>
    </div>
    <h3 class="text-xl font-semibold text-gray-800 mb-2">Yakin ingin keluar?</h3>
    <p class="text-gray-500 mb-6">Jika keluar, Anda harus masuk kembali untuk mengakses beranda.</p>
    <div class="flex justify-center gap-4">
      <button id="cancelLogout" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-800 font-medium hover:bg-gray-300 transition">Batal</button>
      <button id="confirmLogout" class="px-5 py-2 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 transition">Keluar</button>
    </div>
  </div>
</div>

<!-- Footer -->
@include('user.layout.footer')

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>