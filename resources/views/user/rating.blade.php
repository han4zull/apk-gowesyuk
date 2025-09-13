<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GowesYuk - Rating</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/user/rating.css') }}">
</head>
<body class="antialiased font-sans text-gray-900 min-h-screen flex flex-col custom-bg">

  <!-- Navbar -->
  @include('user.layout.navbar')  

  <!-- SECTION RATING -->
<section class="relative py-20 text-gray-900 antialiased">
  <div class="max-w-6xl mx-auto px-6 text-center">
    
    <!-- Judul -->
    <div class="mb-12">
      <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">
        Apa Kata <span class="text-gray-500">Pelanggan Kami</span>
      </h2>
      <p class="mt-4 text-gray-600 text-lg leading-relaxed max-w-2xl mx-auto">
        Ribuan pelanggan telah mempercayai layanan rental sepeda kami.  
        Inilah sebagian pengalaman mereka bersama <span class="font-semibold">GowesYuk</span>.
      </p>
    </div>

    <!-- Card Reviews -->
  <div class="grid md:grid-cols-3 gap-10 max-w-6xl w-full">
    
    <!-- Card -->
    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:translate-y-[-4px] transition-all duration-300">
      <div class="flex items-center text-yellow-400 mb-5">
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons text-gray-300">star</span>
      </div>
      <p class="italic mb-6 text-gray-600 leading-relaxed">
        “GowesYuk sangat membantu untuk mobilitas harian saya. Sepedanya berkualitas dan pelayanannya memuaskan!”
      </p>
      <div class="flex items-center gap-4">
        <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center">
          <span class="material-icons text-gray-400 text-5xl">account_circle</span>
        </div>
        <div>
          <p class="font-semibold text-gray-800">Sarah Wijaya</p>
          <p class="text-sm text-gray-500">Mahasiswa</p>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:translate-y-[-4px] transition-all duration-300">
      <div class="flex items-center text-yellow-400 mb-5">
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons text-gray-300">star</span>
      </div>
      <p class="italic mb-6 text-gray-600 leading-relaxed">
        “Pelayanannya cepat, sepeda selalu dalam kondisi prima. Recommended banget buat yang suka gowes santai maupun harian.”
      </p>
      <div class="flex items-center gap-4">
        <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center">
          <span class="material-icons text-gray-400 text-5xl">account_circle</span>
        </div>
        <div>
          <p class="font-semibold text-gray-800">Rizky Adi</p>
          <p class="text-sm text-gray-500">Karyawan</p>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:translate-y-[-4px] transition-all duration-300">
      <div class="flex items-center text-yellow-400 mb-5">
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
        <span class="material-icons">star</span>
      </div>
      <p class="italic mb-6 text-gray-600 leading-relaxed">
        “Pengalaman sewa terbaik! Prosesnya gampang, pilihan sepedanya banyak, dan harganya sangat terjangkau.”
      </p>
      <div class="flex items-center gap-4">
        <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center">
          <span class="material-icons text-gray-400 text-5xl">account_circle</span>
        </div>
        <div>
          <p class="font-semibold text-gray-800">Laras Putri</p>
          <p class="text-sm text-gray-500">Ibu Rumah Tangga</p>
        </div>
      </div>
    </div>

    </div>
  </div>
</section>


  <!-- Footer -->
  @include('user.layout.footer') 

</body>
</html>
