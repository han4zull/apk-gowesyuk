<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tentang Kami — GowesYuk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <script src="{{ asset('js/navbar.js') }}"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
  <meta name="color-scheme" content="light">
  <link rel="stylesheet" href="{{ asset('css/user/tentang.css') }}">
</head>
<body class="antialiased font-sans text-gray-900 min-h-screen flex flex-col" style="background: radial-gradient(circle at 50% 0%, #e2e1fc 0%, #ffffffff 100%);">

  <!-- NAVBAR -->
  @include('user.layout.navbar')

  <!-- HERO -->
  <main class="flex-1">
<section class="relative py-20 text-gray-900 antialiased">
    <div class="max-w-7xl mx-auto px-6 pt-5 pb-8 md:pt-5 md:pb-16 grid lg:grid-cols-2 gap-12 items-center">
      <div>
        <span class="inline-flex items-center gap-2 text-xs tracking-wide uppercase text-gray-500">
          <span class="material-symbols-outlined text-base">verified</span> Platform Penyewaan Sepeda
        </span>
        <h1 class="mt-4 text-4xl md:text-6xl font-extrabold leading-tight">
          Tentang <span class="text-gray-500">GowesYuk</span>
        </h1>
        <p class="mt-6 text-lg md:text-xl text-gray-600 leading-relaxed">
          Kami bikin sewa sepeda jadi <span class="font-semibold text-gray-800">mudah, cepat, dan terjangkau</span>.
          Pengalaman yang berasa aplikasi beneran: alur jelas, UI rapi, dan dukungan yang responsif.
        </p>

        <!-- mini badges -->
        <div class="mt-8 flex flex-wrap gap-3">
          <div class="px-4 py-2 rounded-full bg-white border border-gray-200 text-sm text-gray-700">Tanpa Ribet</div>
          <div class="px-4 py-2 rounded-full bg-white border border-gray-200 text-sm text-gray-700">Harga Transparan</div>
          <div class="px-4 py-2 rounded-full bg-white border border-gray-200 text-sm text-gray-700">Banyak Pilihan Sepeda</div>
        </div>

        <!-- CTA -->
        <div class="mt-10 flex flex-col sm:flex-row gap-4">
          <a href="/sewa_sepeda" class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-black text-white font-semibold hover:bg-gray-800 card-hover">
            Mulai Sewa
            <span class="material-symbols-outlined ms-1">arrow_forward</span>
          </a>
          <a href="#cara-kerja" class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-white border border-gray-200 text-gray-800 font-semibold hover:bg-gray-100 card-hover">
            Lihat Cara Kerja
          </a>
        </div>
      </div>

      <!-- Mockup Aplikasi (Laptop Style) -->
<div class="relative flex justify-center">
  <div class="laptop-frame w-[640px] h-[400px] bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
    
    <!-- Bagian Atas Laptop -->
    <div class="h-8 bg-gray-900 flex items-center px-3 space-x-2">
      <div class="w-3 h-3 rounded-full bg-red-500"></div>
      <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
      <div class="w-3 h-3 rounded-full bg-green-500"></div>
      <span class="ml-4 text-xs text-gray-200">GowesYuk App</span>
    </div>

    <!-- Isi Mockup Aplikasi -->
    <div class="p-6 space-y-4">
      <div class="h-10 rounded-xl bg-gray-100 flex items-center px-4 justify-between">
        <span class="text-sm text-gray-600">Cari sepeda…</span>
        <span class="material-symbols-outlined text-gray-500">search</span>
      </div>

      <div class="grid grid-cols-3 gap-4">
        <div class="rounded-xl bg-gray-100 h-28"></div>
        <div class="rounded-xl bg-gray-100 h-28"></div>
        <div class="rounded-xl bg-gray-100 h-28"></div>
      </div>

      <div class="rounded-2xl border border-gray-200 p-4">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-gray-100"></div>
          <div class="flex-1">
            <div class="h-3 w-24 bg-gray-200 rounded mb-2"></div>
            <div class="h-3 w-40 bg-gray-200 rounded"></div>
          </div>
        </div>
        <button class="mt-4 w-full py-2.5 rounded-xl bg-black text-white text-sm font-semibold">
          Sewa Sekarang
        </button>
      </div>
    </div>
  </div>
</div>

  <!-- Background Blur -->
  <div class="absolute -z-10 blur-3xl opacity-30 w-96 h-96 bg-gray-300 rounded-full left-1/2 -translate-x-1/2 top-10"></div>
</div>

  <!-- STATS -->
  <section class="relative py-12">
    <div class="max-w-6xl mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white border border-gray-200 rounded-2xl p-6 text-center card-hover">
          <div class="text-3xl font-extrabold">120+</div>
          <div class="mt-1 text-sm text-gray-500">Unit Sepeda</div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 text-center card-hover">
          <div class="text-3xl font-extrabold">20+</div>
          <div class="mt-1 text-sm text-gray-500">Kota Terlayani</div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 text-center card-hover">
          <div class="text-3xl font-extrabold">4.9/5</div>
          <div class="mt-1 text-sm text-gray-500">Rata Ulasan</div>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-6 text-center card-hover">
          <div class="text-3xl font-extrabold">24/7</div>
          <div class="mt-1 text-sm text-gray-500">Support</div>
        </div>
      </div>
    </div>
  </section>

  <!-- TENTANG / VALUE -->
  <section class="relative py-20">
    <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-3 gap-8">
      <div class="lg:col-span-1">
        <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">Kami percaya bersepeda itu <span class="text-gray-500">simple</span>, sehat, dan seru.</h2>
        <p class="mt-5 text-gray-600 leading-relaxed">
          Fokus kami: pengalaman yang enak dipakai. Browsing sepeda cepat, pemesanan jelas, status realtime.
          Semua monokrom biar elegan dan nggak bikin pusing.
        </p>
      </div>
      <div class="lg:col-span-2 grid sm:grid-cols-2 gap-6">
        <div class="bg-white border border-gray-200 rounded-2xl p-7 soft-shadow card-hover">
          <div class="flex items-center gap-3 mb-3">
            <span class="material-symbols-outlined">speed</span>
            <h3 class="font-semibold text-lg">Kinerja Cepat</h3>
          </div>
          <p class="text-gray-600">UX sederhana, halaman ringan, proses sewa singkat dari pilih–bayar–ambil.</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-7 soft-shadow card-hover">
          <div class="flex items-center gap-3 mb-3">
            <span class="material-symbols-outlined">verified_user</span>
            <h3 class="font-semibold text-lg">Transparan & Aman</h3>
          </div>
          <p class="text-gray-600">Harga jelas, metode pembayaran aman, data identitas terjaga.</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-7 soft-shadow card-hover">
          <div class="flex items-center gap-3 mb-3">
            <span class="material-symbols-outlined">directions_bike</span>
            <h3 class="font-semibold text-lg">Sepeda Terawat</h3>
          </div>
          <p class="text-gray-600">Unit rutin diservis. Siap buat commute, santai, atau long ride.</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-7 soft-shadow card-hover">
          <div class="flex items-center gap-3 mb-3">
            <span class="material-symbols-outlined">support_agent</span>
            <h3 class="font-semibold text-lg">Dukungan Responsif</h3>
          </div>
          <p class="text-gray-600">Butuh bantuan? Tim kami standby membantu dari awal sampai selesai.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CARA KERJA -->
  <section id="cara-kerja" class="max-w-7xl mx-auto px-6 py-16 text-center">
    <h2 class="text-4xl font-semibold mb-2">Cara Kerja</h2>
  <p class="text-gray-500 mb-12">Proses sewa sepeda yang mudah dan cepat dalam 5 langkah sederhana</p>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">

    <!-- Langkah 1 -->
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">search</span>
      </div>
      <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">1</div>
      <h3 class="font-semibold mb-2">Pilih Sepeda</h3>
      <p class="text-gray-400 text-sm">Cari dan pilih sepeda yang sesuai dengan kebutuhan Anda dari berbagai pilihan yang tersedia.</p>
    </div>

    <!-- Langkah 2 -->
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">description</span>
      </div>
      <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">2</div>
      <h3 class="font-semibold mb-2">Isi Formulir</h3>
      <p class="text-gray-400 text-sm">Lengkapi formulir online untuk melanjutkan proses penyewaan.</p>
    </div>

    <!-- Langkah 3 -->
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">credit_card</span>
      </div>
      <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">3</div>
      <h3 class="font-semibold mb-2">Bayar dan Konfirmasi</h3>
      <p class="text-gray-400 text-sm">Lakukan pembayaran dengan aman melalui berbagai metode yang tersedia.</p>
    </div>

    <!-- Langkah 4 (Ambil + Serahkan Identitas) -->
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">directions_bike</span>
      </div>
      <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">4</div>
      <h3 class="font-semibold mb-2">Ambil & Serahkan Identitas</h3>
      <p class="text-gray-400 text-sm">Ambil sepeda di lokasi yang ditentukan, lalu serahkan KTP atau Kartu Pelajar sebagai jaminan yang disimpan di toko.</p>
    </div>

    <!-- Langkah 5 -->
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-3xl">replay</span>
      </div>
      <div class="absolute top-2 right-2 bg-black text-white w-6 h-6 rounded-full flex items-center justify-center text-xs">5</div>
      <h3 class="font-semibold mb-2">Kembalikan</h3>
      <p class="text-gray-400 text-sm">Kembalikan sepeda di lokasi yang sama, lalu ambil kembali identitas Anda.</p>
    </div>

  </div>
  </section>

  <!-- CTA FINAL -->
  <section class="relative py-20">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h2 class="text-3xl md:text-4xl font-extrabold">Siap gowes tanpa ribet?</h2>
      <p class="mt-3 text-gray-600">Pilih sepeda favoritmu dan mulai sekarang.</p>
      <div class="mt-8">
        <a href="/sewa" class="inline-flex items-center px-7 py-3 rounded-xl bg-black text-white font-semibold hover:bg-gray-800 card-hover">
          Sewa Sekarang
          <span class="material-symbols-outlined ms-1">arrow_forward</span>
        </a>
      </div>
    </div>
  </section>
  </main>

  <!-- FOOTER -->
  @include('user.layout.footer')

</body>
</html>
