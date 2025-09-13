
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sewa Sepeda Terbaik</title>
  <script src="https://cdn.tailwindcss.com"></script>  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
  <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/user/landing_page.css') }}">
  <script src="{{ asset('js/user/landing_page.js') }}"></script>
</head>

<body class="antialiased font-sans text-gray-900 min-h-screen flex flex-col custom-bg">

<!-- Logout Success Modal -->
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full text-center transform scale-95 opacity-0 transition-all duration-300">
    <!-- Ikon sukses -->
    <div class="mx-auto w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mb-3">
      <i class="bx bx-check-circle text-green-600 text-3xl"></i>
    </div>

    <!-- Judul -->
    <h2 class="text-xl font-semibold text-gray-800 mb-2">Anda telah keluar!</h2>

    <!-- Deskripsi -->
    <p class="text-gray-500 mb-6">Anda telah berhasil keluar dari akun Anda.</p>

    <!-- Tombol tutup -->
    <button id="closeSuccessModal" class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
      Tutup
    </button>
  </div>
</div>

  
  <!-- Navbar -->
  @include('user.layout.navbar')

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
      <img src="{{ asset('images/sepeda/sepeda30.jpg') }}" alt="Sepeda gunung hitam modern" class="object-contain h-72" onerror="this.style.display='none'" />
    </div>
  </header>


  <!-- Cara Kerja Section -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center">
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
  @foreach($sepeda as $s)
    <div class="bg-white rounded-lg shadow-lg min-w-[250px] flex-shrink-0 flex flex-col">
      <div class="p-4 flex flex-col justify-between flex-grow">
        <img src="{{ asset('storage/sepeda/'.$s->gambar_sepeda) }}" class="rounded-t-lg h-40 w-full object-contain bg-white-100" />
        <h3 class="font-semibold text-lg mb-2">{{ $s->nama_sepeda }}</h3>
        <p class="text-sm text-gray-700 flex-grow">{{ Str::limit($s->deskripsi_sepeda, 60, '...') }}</p>
        <p class="font-bold mt-3 mb-3">
          Rp {{ number_format($s->harga_jam ?? 0, 0, ",", ".") }}
          <span class="text-gray-500 font-normal text-sm">per jam</span>
        </p>
         <a href="{{ route('user.detail', $s->id) }}" 
             class="mt-4 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition text-center">
          Sewa Sekarang
        </a>
      </div>
    </div>
  @endforeach
</div>

  </section>


<!-- Trending + Promo Section -->
<section class="flex flex-col lg:flex-row max-w-7xl mx-auto px-6 pb-16 w-full mt-12 gap-8">
  <!-- Trending -->
  <div class="flex flex-col flex-1">
    <div class="flex flex-col mb-6">
      <h2 class="text-2xl font-bold flex items-center gap-3">
        <span class="material-symbols-outlined text-4xl text-red-500" style="font-variation-settings: 'wght' 700, 'FILL' 1;">
          local_fire_department
        </span>
        TRENDING
      </h2>
      <p class="text-gray-500 mt-1">Pilihan sepeda terfavorit pekan ini!</p>
    </div>

    <!-- List trending -->
    <div class="flex gap-8">
      <div class="flex overflow-x-auto gap-4 scrollbar-hide flex-1">
        @foreach($trending ?? [] as $bike)
          <div class="bg-white rounded-lg shadow-lg flex-shrink-0 w-[28%] flex flex-col min-h-[360px]">
            <img src="{{ asset('storage/sepeda/' . $bike->gambar_sepeda) }}" 
                 alt="{{ $bike->nama_sepeda }}" 
                 class="rounded-t-lg object-contain w-32 h-32 mx-auto" />
            <div class="p-3 flex flex-col justify-between flex-grow">
              <h3 class="font-semibold text-lg mb-1">{{ $bike->nama_sepeda }}</h3>
              <p class="text-sm text-gray-700 flex-grow">
                {{ Str::limit($bike->deskripsi_sepeda, 30) }}
              </p>        
              <p class="font-bold mt-3 mb-3">Rp {{ number_format($bike->harga_jam,0,",",".") }} <span class="text-gray-500 font-normal text-sm">per jam</span></p>
              <a href="{{ route('user.detail', $bike->id) }}" 
                 class="mt-3 bg-black text-white w-full py-2 rounded font-semibold text-sm hover:bg-gray-900 transition text-center">
                Sewa Sekarang
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Promo -->
  <div class="flex flex-col flex-shrink-0 w-full lg:w-1/4">
    <!-- header biar sejajar dengan TRENDING -->
    <div class="flex flex-col mb-6">
      <h2 class="text-2xl font-bold flex items-center gap-3">
        <span class="material-symbols-outlined text-4xl text-green-500" style="font-variation-settings: 'wght' 700, 'FILL' 1;">
          sell
        </span>
        PROMO
      </h2>
      <p class="text-gray-500 mt-1">Jangan lewatkan penawaran spesial!</p>
    </div>

    <!-- Box scroll promo -->
    <div class="flex flex-col gap-4 overflow-y-auto max-h-[360px]">
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
  </div>
</section>

<!-- Footer -->
@include('user.layout.footer')
  
</body>
</html>
