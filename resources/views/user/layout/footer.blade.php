<footer class="bg-black text-gray-300 pt-10 pb-6 px-6 mt-auto">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row justify-between gap-10">
    
    <!-- Logo + Deskripsi -->
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

    <!-- Link Cepat -->
    <div class="text-left -ml-50">
      <h4 class="font-semibold mb-3 text-white">Link Cepat</h4>
      <ul class="space-y-2 text-sm pl-0 ml-0">
        <li><a href="{{ route('user.landing_page') }}" class="hover:text-white transition">Beranda</a></li>
        <li><a href="{{ route('user.sewa_sepeda') }}" class="hover:text-white transition">Sewa Sepeda</a></li>
        <li><a href="{{ route('user.tentang') }}" class="hover:text-white transition">Tentang</a></li>
        <li><a href="{{ route('user.rating') }}" class="hover:text-white transition">Rating</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div>
      <h4 class="font-semibold mb-3 text-white text-lg">Kontak</h4>
      <ul class="space-y-2 text-sm">

        <!-- Phone -->
        <li>
          <a href="tel:+6285187803375" class="hover:text-white transition flex items-center gap-3">
            <!-- Phone SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.05-.24 11.36 11.36 0 003.56.57 1 1 0 011 1v3.61a1 1 0 01-.91 1A16 16 0 014 5.91 1 1 0 015 5h3.61a1 1 0 011 1 11.36 11.36 0 00.57 3.56 1 1 0 01-.24 1.05l-2.32 2.18z"/>
            </svg>
            +62 851-8780-3375‬
          </a>
        </li>

        <!-- Instagram -->
        <li>
          <a href="https://instagram.com/gowesyuk.ofc" target="_blank" rel="noopener" class="hover:text-white transition flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.66 0-3-1.34-3-3V7c0-1.66 1.34-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-2a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
            </svg>
            ig: gowesyuk.ofc
          </a>
        </li>

        <!-- Facebook -->
        <li>
          <a href="https://facebook.com/gowesyuk.ofc" target="_blank" rel="noopener" class="hover:text-white transition flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 5 3.66 9.13 8.44 9.88v-6.99h-2.54V12h2.54V9.79c0-2.5 1.49-3.88 3.77-3.88 1.09 0 2.23.2 2.23.2v2.46h-1.25c-1.23 0-1.61.77-1.61 1.56V12h2.74l-.44 2.89h-2.3v6.99C18.34 21.13 22 17 22 12z"/>
            </svg>
            fb: gowesyuk.ofc
          </a>
        </li>

        <!-- Email -->
        <li>
          <a href="mailto:gowesyuk2025@gmail.com" class="hover:text-white transition flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 2l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/>
            </svg>
            gowesyuk2025@gmail.com
          </a>
        </li>

        <!-- Lokasi -->
        <li>
          <a href="https://maps.google.com/?q=Wanaherang,+Kec.+Gn.+Putri,+Kabupaten+Bogor,+Jawa+Barat" target="_blank" rel="noopener" class="hover:text-white transition flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/>
            </svg>
            Wanaherang, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat
          </a>
        </li>
      </ul>
    </div>
  </div>

  <p class="text-center text-gray-500 text-xs mt-10">© 2025 GowesYuk. Semua hak cipta dilindungi.</p>
</footer>

<link rel="stylesheet" href="{{ asset('css/user/layout/footer.css') }}">

