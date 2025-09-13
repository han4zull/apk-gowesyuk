<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Sepeda Listrik Merah Klasik - GowesYuk</title>
  <!-- Tailwind (opsional) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>

<body class="bg-[#d6d6f5] font-sans text-gray-900 min-h-screen flex flex-col">
  
<!-- Navbar -->
<nav class="flex items-center justify-between px-6 py-4 bg-white shadow-lg sticky top-0 z-50">
  <div class="flex items-center space-x-3">
    <img src="{{ asset('images/gowesyuk1.png') }}" alt="Logo GowesYuk" class="w-19 h-10" />
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
                <button class="flex items-center">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="w-9 h-9 rounded-full" alt="Profile">
                </button>
            </div>
        @endauth
    </div>
</nav>

  <!-- Product Detail Section -->
<main class="max-w-7xl mx-auto px-6 py-8">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
    
    <!-- Product Image + Deskripsi -->
<div class="flex flex-col items-center space-y-4">
  <!-- Gambar -->
  <div class="w-full max-w-md bg-white rounded-lg shadow border-2 border-black p-2">
    <img src="{{ asset('images/sepeda/'.$sepeda->gambar_sepeda) }}" 
         alt="{{ $sepeda->nama_sepeda }}" 
         class="w-full h-auto object-contain rounded-md" />
  </div>

  <!-- Deskripsi Produk -->
  <div class="w-full max-w-md bg-white p-5 rounded-lg shadow border text-gray-700">
    <h3 class="text-lg font-semibold mb-2 border-b pb-2">Deskripsi Produk</h3>
    <p class="leading-relaxed text-justify">
      {{ $sepeda->deskripsi_sepeda }}
    </p>
  </div>
</div>


    <!-- Product Info -->
    <div class="space-y-6">
      <div>
        <h1 class="text-3xl font-bold mb-3">{{ $sepeda->nama_sepeda }}</h1>
        <div class="flex items-center space-x-4 mb-4">
          <div class="flex items-center">
            <div class="flex text-yellow-400">⭐⭐⭐⭐⭐</div>
            <span class="ml-2 text-sm text-gray-600">({{ $sepeda->ulasan }} ulasan)</span>
          </div>
          <span class="px-2 py-1 rounded-full text-xs font-medium
              {{ $sepeda->status == 'Disewa' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
              {{ $sepeda->status ?? 'Tersedia' }}
          </span>
        </div>
        <p class="text-3xl font-bold text-black">
          Rp {{ number_format($sepeda->harga_per_jam, 0, ',', '.') }} 
          <span class="text-lg font-normal text-gray-600">/ jam</span>
        </p>
      </div>

      <!-- Rental Options -->
      <div class="space-y-4">
        <h3 class="font-semibold text-lg">Pilihan Sewa</h3>
        <div class="space-y-3">
          <div class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50">
            <div>
              <label class="font-medium">Per Jam</label>
              <p class="text-sm text-gray-600 ml-2">Minimal 1 jam</p>
            </div>
            <span class="font-semibold">Rp {{ number_format($sepeda->harga_per_jam, 0, ',', '.') }}</span>
          </div>
          <div class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50">
            <div>
              <label class="font-medium">Per Hari</label>
              <p class="text-sm text-gray-600 ml-2">24 jam</p>
            </div>
            <span class="font-semibold">Rp {{ number_format($sepeda->harga_per_hari, 0, ',', '.') }}</span>
          </div>
        </div>
      </div>
    
      <!-- Action Buttons -->
    <!-- Tombol sewa sekarang yang SUDAH kamu punya -->
     <button id="openRentalBtn"
             class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 text-sm">
      Sewa Sekarang
     </button>

  
  <div class="grid grid-cols-2 gap-3">
    <button class="border border-black py-2 rounded-lg font-semibold hover:bg-gray-100 transition">💝 Favorit</button>
    <button id="helpBtn" class="border border-black py-2 rounded-lg font-semibold hover:bg-gray-100 transition">📞 Bantuan</button>
  </div>
</div>

    </div>
  </div>
</main>

  <!-- Product Description -->
  @include('pop_up')


<!-- Footer -->
<footer class="bg-black text-gray-300 pt-10 pb-6 px-6 mt-auto">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row justify-between gap-10">
    <div>
      <h3 class="font-bold text-xl mb-2 flex items-center gap-2">
        <img src="{{ asset('images/gowesyuk2.png') }}" alt="Logo GowesYuk" class="w-10 h-10 object-contain"/>
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
    // Interaktif galeri produk
    const thumbnails = document.querySelectorAll('#productThumbnails img');
    const mainImage = document.getElementById('mainProductImage');
    const mainColor = document.getElementById('mainProductColor');
    let currentIndex = 0;

    // Mengambil data gambar dan warna dari atribut data-img dan data-color pada thumbnail
    const images = Array.from(thumbnails).map(img => ({
      src: img.getAttribute('data-img'),
      color: img.getAttribute('data-color')
    }));

    // Fungsi untuk memperbarui gambar utama dan status thumbnail
    function updateGallery(idx) {
      currentIndex = idx; // Perbarui indeks saat ini
      mainImage.src = images[idx].src; // Ganti sumber gambar utama
      mainImage.alt = 'Sepeda Listrik ' + images[idx].color; // Perbarui alt text
      mainColor.textContent = images[idx].color; // Perbarui teks warna

      // Perbarui border pada thumbnail: hijau untuk yang aktif, transparan untuk yang lain
      thumbnails.forEach((thumb, i) => {
        thumb.classList.toggle('border-green-400', i === idx);
        thumb.classList.toggle('border-transparent', i !== idx);
      });
    }

    // Tambahkan event listener untuk setiap thumbnail
    thumbnails.forEach((thumb, idx) => {
      thumb.addEventListener('click', () => {
        updateGallery(idx); // Panggil updateGallery saat thumbnail diklik
      });
    });

    // Tambahkan event listener untuk tombol panah "Sebelumnya"
    document.getElementById('galleryPrev').addEventListener('click', () => {
      // Hitung indeks sebelumnya, pastikan melingkar (dari 0 kembali ke terakhir)
      let idx = (currentIndex - 1 + images.length) % images.length;
      updateGallery(idx);
    });

    // Tambahkan event listener untuk tombol panah "Berikutnya"
    document.getElementById('galleryNext').addEventListener('click', () => {
      // Hitung indeks berikutnya, pastikan melingkar (dari terakhir kembali ke 0)
      let idx = (currentIndex + 1) % images.length;
      updateGallery(idx);
    });

    // Inisialisasi galeri saat halaman dimuat, tampilkan gambar pertama
    updateGallery(0);

    // Tab functionality (sudah ada di kode Anda, disertakan untuk kelengkapan)
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const targetTab = btn.getAttribute('data-tab');
        
        // Remove active classes
        document.querySelectorAll('.tab-btn').forEach(b => {
          b.classList.remove('border-black', 'text-black');
          b.classList.add('border-transparent', 'text-gray-500');
        });
        
        // Add active class to clicked tab
        btn.classList.add('border-black', 'text-black');
        btn.classList.remove('border-transparent', 'text-gray-500');
        
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
          content.classList.add('hidden');
        });
        
        // Show target tab content
        document.getElementById(targetTab).classList.remove('hidden');
      });
    });

    // FAQ functionality (sudah ada di kode Anda, disertakan untuk kelengkapan)
    document.querySelectorAll('.faq-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const content = btn.nextElementSibling;
        const icon = btn.querySelector('span');
        
        if (content.classList.contains('hidden')) {
          content.classList.remove('hidden');
          icon.textContent = '−';
        } else {
          content.classList.add('hidden');
          icon.textContent = '+';
        }
      });
    });

    // Help button functionality (sudah ada di kode Anda, disertakan untuk kelengkapan)
    document.getElementById('helpBtn').addEventListener('click', () => {
      window.open('tel:+6281234567890', '_self');
    });

    document.addEventListener("DOMContentLoaded", () => {
  const rentalModal = document.getElementById("rentalModal");
  const cancelBtn = document.getElementById("cancelBtn");
  const konfirmasiBtn = document.getElementById("konfirmasiBtn");
  const metodeModal = document.getElementById("metodeModal");
  const backBtn = document.getElementById("backBtn");

  // cari semua tombol "Sewa Sekarang"
  document.querySelectorAll(".sewaSekarangBtn").forEach(btn => {
    btn.addEventListener("click", () => {
      if (rentalModal) rentalModal.classList.remove("hidden");
    });
  });

  // tombol batal di modal sewa
  if (cancelBtn) {
    cancelBtn.addEventListener("click", () => {
      rentalModal.classList.add("hidden");
    });
  }

  // tombol konfirmasi -> buka modal metode pembayaran
  if (konfirmasiBtn) {
    konfirmasiBtn.addEventListener("click", () => {
      rentalModal.classList.add("hidden");
      metodeModal?.classList.remove("hidden");
    });
  }

  // tombol kembali di modal metode pembayaran
  if (backBtn) {
    backBtn.addEventListener("click", () => {
      metodeModal.classList.add("hidden");
      rentalModal.classList.remove("hidden");
    });
  }
});
</script>
</body>
</html>
