<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sewa Sepeda 100 Card</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
<body class="bg-[#f3f3ff] flex flex-col min-h-screen">

<!-- Navbar -->
<nav class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50">
  <div class="flex items-center space-x-3">
    <img src="images/gowesyuk1.png" alt="Logo GowesYuk" class="w-19 h-10" />
    <span class="text-xl font-bold text-gray-800">GowesYuk</span>
  </div>
  <div class="flex items-center space-x-6 justify-center flex-1">
    <a href="landing_page" class="block px-3 py-2 rounded-md hover:bg-gray-100">Beranda</a>
    <a href="sewa_sepeda" class="px-3 py-1 border border-gray-400 rounded bg-gray-200 font-semibold text-sm">Sewa Sepeda</a>
    <a href="tentang" class="block px-3 py-2 rounded-md hover:bg-gray-100">Tentang</a>
    <a href="rating" class="block px-3 py-2 rounded-md hover:bg-gray-100">Rating</a>
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

<!-- Konten Utama -->
<main class="flex-1 flex flex-col max-w-7xl mx-auto px-6 py-8 w-full">

  <h1 class="text-3xl font-bold mb-2">Sewa Sepeda</h1>
  <p class="text-gray-500 mb-6">Pilih sepeda yang sesuai dengan kebutuhan dan preferensi Anda</p>

  <div class="flex gap-6">
    <!-- Filter -->
    <div class="bg-white p-4 rounded-lg shadow w-64 sticky top-24 self-start">
        <h2 class="font-semibold mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined">filter_alt</span> Filter Pencarian
        </h2>
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">Jenis Sepeda</label>
            <select id="jenis-sepeda" class="w-full border border-gray-300 rounded px-2 py-1">
                <option value="semua">Semua Jenis</option>
                <option value="listrik">Sepeda Listrik</option>
                <option value="gunung">Sepeda Gunung</option>
                <option value="lipat">Sepeda Lipat</option>
                <option value="hybrid">Sepeda Hybrid</option>
                <option value="bmx">Sepeda BMX</option>
                <option value="cruiser">Sepeda Cruiser</option>
                <option value="fixie">Sepeda Fixie</option>
                <option value="anak">Sepeda Anak</option>
                <option value="tandem">Sepeda Tandem</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">Rentang Harga</label>
            <select id="harga-sepeda" class="w-full border border-gray-300 rounded px-2 py-1">
                <option value="semua">Semua Harga</option>
                <option value="0-25000">0 - 25.000</option>
                <option value="25001-50000">25.000 - 50.000</option>
                <option value="50001-100000">50.000 - 100.000</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button id="btn-terapkan" class="bg-black text-white px-3 py-1 rounded font-bold">Terapkan</button>
            <button id="btn-reset" class="bg-gray-200 px-3 py-1 rounded">Reset</button>
        </div>
    </div>

    <!-- Daftar Sepeda -->
<div id="daftar-sepeda" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 flex-1">
  @foreach($sepeda as $s)
  <div class="bg-white rounded-lg shadow p-6 flex flex-col sepeda-card"
       data-jenis="{{ strtolower($s->jenis_sepeda) }}"
       data-harga="{{ $s->harga_sepeda }}">

      <span class="text-xs font-semibold mb-2">{{ strtoupper($s->jenis_sepeda) }}</span>

      <!-- Biar semua gambar sama tinggi -->
      <img src="{{ asset('images/sepeda/'.$s->gambar_sepeda) }}" 
           alt="{{ $s->nama_sepeda }}" 
           class="mb-3 w-full h-40 object-contain">

      <h3 class="font-semibold mb-1 text-sm">{{ $s->nama_sepeda }}</h3>
      
  
      <!-- Bagian bawah didorong otomatis ke paling bawah -->
      <div class="mt-auto">
        <p class="font-bold mb-3">
          Rp {{ number_format($s->harga_sepeda,0,",",".") }} 
          <span class="text-gray-500 font-normal text-sm">per hari</span>
        </p>
        
        <a href="{{ route('detail_produk', $s->id) }}" 
          class="bg-black text-white py-2 rounded font-bold hover:bg-gray-800 mt-auto block text-center">
          SEWA SEKARANG
        </a>
      </div>
  </div>
  @endforeach
</div>


</main>

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

<script>
const btnTerapkan = document.getElementById('btn-terapkan');
const btnReset = document.getElementById('btn-reset');
const sepedaCards = document.querySelectorAll('.sepeda-card');

btnTerapkan.addEventListener('click', () => {
  const jenis = document.getElementById('jenis-sepeda').value;
  const harga = document.getElementById('harga-sepeda').value;

  sepedaCards.forEach(card => {
    const cardJenis = card.getAttribute('data-jenis');
    const cardHarga = parseInt(card.getAttribute('data-harga'));

    const jenisMatch = (jenis === 'semua') || (cardJenis === jenis);

    let hargaMatch = false;
    if(harga === 'semua') {
      hargaMatch = true;
    } else {
      const [min, max] = harga.split('-').map(Number);
      hargaMatch = cardHarga >= min && cardHarga <= max;
    }

    card.style.display = (jenisMatch && hargaMatch) ? 'flex' : 'none';
  });
});

btnReset.addEventListener('click', () => {
  document.getElementById('jenis-sepeda').value = 'semua';
  document.getElementById('harga-sepeda').value = 'semua';
  sepedaCards.forEach(card => card.style.display = 'flex');
});
</script>

</body>
</html>
