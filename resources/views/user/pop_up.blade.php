<!-- ===== MODAL SEWA ===== -->
<div id="rentalModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-8">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-6 flex gap-4 relative max-h-[102vh] overflow-y-auto">

    <!-- Kiri: Gambar & info sepeda -->
    <div class="flex flex-col gap-2 w-1/2">
      <span class="text-[9px] bg-gray-200 rounded-full px-2 py-0.5 inline-block">
        {{ strtoupper($sepeda->jenis_sepeda) }}
      </span>
      <img src="{{ asset('storage/sepeda/' . $sepeda->gambar_sepeda) }}" class="w-full h-48 object-contain rounded-lg border">
      <h3 class="font-semibold text-sm">{{ $sepeda->nama_sepeda }}</h3>
      <p class="text-gray-600 text-[11px] leading-snug">{{ $sepeda->deskripsi_sepeda }}</p>
      <div class="flex gap-1 text-[9px] flex-wrap">
        @foreach(explode(',', $sepeda->tag_sepeda) as $tag)
          <span class="px-2 py-0.5 bg-gray-200 rounded">{{ strtoupper(trim($tag)) }}</span>
        @endforeach
      </div>
      <div class="bg-gray-100 p-1.5 rounded-lg font-bold text-sm text-center mt-1">
        Rp {{ number_format($sepeda->harga_jam,0,',','.') }}
        <span class="text-[10px] font-normal"> / jam</span>
      </div>
    </div>

    <!-- ===== FORM PENYEWAAN ===== -->
    <form id="sewaForm" action="{{ route('penyewaan.store', $sepeda->id) }}" method="POST" class="flex flex-col gap-3 w-1/2 bg-white p-4 rounded-xl shadow-md">
      @csrf
      <input type="hidden" name="id_sepeda" value="{{ $sepeda->id }}">
      <input type="hidden" name="nama_sepeda" value="{{ $sepeda->nama_sepeda }}">
      <input type="hidden" name="jenis_sepeda" value="{{ $sepeda->jenis_sepeda }}">
      <input type="hidden" name="kode_sepeda" value="{{ $sepeda->kode_sepeda }}">
      <input type="hidden" id="harga_jam" name="harga_jam" value="{{ $sepeda->harga_jam ?? 0 }}">
      <input type="hidden" id="harga_hari" name="harga_hari" value="{{ $sepeda->harga_hari ?? 0 }}">
      <input type="hidden" id="biaya_admin" name="biaya_admin" value="3000">
      <input type="hidden" name="metode" id="metodeInput">
      <input type="hidden" name="bank" id="bankInput">
      <input type="hidden" name="ewallet" id="ewalletInput">

      <h3 class="font-semibold text-sm border-b pb-1">Detail Penyewaan</h3>
      <div class="grid grid-cols-3 gap-2">
        <div>
          <label class="block text-[12px] font-medium">Tanggal</label>
          <input type="date" name="tanggal" required class="w-full border rounded-lg p-1.5 mt-1 text-xs">
        </div>
        <div>
          <label class="block text-[12px] font-medium">Durasi Jam</label>
          <select id="jamInput" name="durasi_jam" class="w-full border rounded-lg p-1.5 mt-1 text-xs">
            @for($i=0;$i<=23;$i++)
              <option value="{{ $i }}">{{ $i }} jam</option>
            @endfor
          </select>
        </div>
        <div>
          <label class="block text-[12px] font-medium">Durasi Hari</label>
          <select id="hariInput" name="durasi_hari" class="w-full border rounded-lg p-1.5 mt-1 text-xs">
            @for($i=0;$i<=7;$i++)
              <option value="{{ $i }}">{{ $i }} hari</option>
            @endfor
          </select>
        </div>
      </div>

      <h3 class="font-semibold text-sm border-b pb-1">Informasi Penyewa</h3>
      <input type="text" name="nama_lengkap" placeholder="Nama lengkap" required class="w-full border rounded-lg p-1.5 text-xs">
      <input type="text" name="alamat" placeholder="Alamat" required class="w-full border rounded-lg p-1.5 text-xs">
      <input type="email" name="email" placeholder="Email" required class="w-full border rounded-lg p-1.5 text-xs">
      <input type="tel" name="nomor_telepon" placeholder="08xxxxxxxxxx" required class="w-full border rounded-lg p-1.5 text-xs">

      <!-- Estimasi Biaya -->
      <div class="bg-blue-50 p-2 rounded-lg text-xs mt-1" id="estimasiBox">
  <div class="flex justify-between">
    <span>Sewa</span>
    <span id="biayaSewaEstimasi">Rp {{ number_format($sepeda->harga_hari,0,',','.') }}</span>
  </div>
  <div class="flex justify-between">
    <span>Biaya Layanan</span><span>Rp 3000</span>
  </div>
  <hr class="my-1">
  <div class="flex justify-between font-bold">
    <span>Total</span>
    <span id="totalBiayaEstimasi">Rp {{ number_format($sepeda->harga_hari + 3000,0,',','.') }}</span>
  </div>
</div>


      <div class="flex justify-between gap-2 mt-2">
        <button type="button" id="cancelBtn" class="w-1/2 border py-1.5 rounded-lg hover:bg-gray-100 text-xs">Batal</button>
        <button type="button" id="konfirmasiBtn" class="w-1/2 bg-black text-white py-1.5 rounded-lg hover:bg-gray-800 text-xs">Konfirmasi</button>
        <button type="submit" id="submitSewaBtn" class="hidden"></button>
      </div>
    </form>
  </div>
</div>

<!-- ===== MODAL METODE PEMBAYARAN ===== -->
<div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-8">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-6 flex flex-col gap-4 relative">
    <h2 class="font-bold text-lg">Metode Pembayaran</h2>
    <div class="flex gap-2 mt-6">
      <button class="flex-1 border rounded-lg py-1 text-xs hover:bg-gray-100" data-method="cod">Bayar Ditempat</button>
      <button class="flex-1 border rounded-lg py-1 text-xs hover:bg-gray-100" data-method="bank">Transfer Bank</button>
      <button class="flex-1 border rounded-lg py-1 text-xs hover:bg-gray-100" data-method="ewallet">Dompet Digital</button>
    </div>
    <div class="border-t mt-2 pt-2 pb-4" id="paymentContent">
      <p class="text-sm font-medium mt-4">Bayar Ditempat</p>
    </div>
    <div class="bg-blue-50 p-3 rounded-lg text-xs mt-2 self-end w-48" id="summaryBox">
  <div class="flex justify-between">
    <span>Sewa</span>
    <span id="biayaSewaSummary">Rp {{ number_format($sepeda->harga_hari,0,',','.') }}</span>
  </div>
  <div class="flex justify-between">
    <span>Biaya Layanan</span><span id="layananBiaya">Rp 3.000</span>
  </div>
  <hr class="my-1">
  <div class="flex justify-between font-bold">
    <span>Total</span>
    <span id="totalBiayaSummary">Rp {{ number_format($sepeda->harga_hari + 3000,0,',','.') }}</span>
  </div>
</div>
    <div class="flex justify-between gap-2 mt-2">
      <button id="cancelBtnPayment" class="flex-1 border py-2 rounded-lg hover:bg-gray-100 text-xs">Batal</button>
      <button id="buatPesananBtn" class="flex-1 bg-black text-white py-2 rounded-lg hover:bg-gray-800 text-xs">Buat Pesanan</button>
    </div>
  </div>
</div>

<!-- ===== MODAL VIRTUAL ACCOUNT ===== -->
<div id="vaModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 flex flex-col items-center text-center relative animate-[scaleIn_0.3s_ease]">

    <h2 class="font-bold text-lg mb-3 text-gray-800">Virtual Account</h2>
    <p class="text-sm text-gray-600">Silakan transfer ke nomor VA berikut:</p>

    <!-- Card VA -->
    <div class="bg-gray-50 border rounded-xl p-5 shadow-inner mt-4 w-full">
      <p id="vaNumber" class="font-mono text-2xl text-blue-600 tracking-wider select-all">
        1234 5678 9012 3456
      </p>
      <p class="text-xs text-gray-400 mt-2">Nomor ini unik untuk pesananmu</p>
    </div>

    <button id="closeVAModalBtn"
      class="mt-6 w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-2.5 rounded-xl font-semibold shadow hover:opacity-90 transition">
      Oke, Saya Sudah Transfer
    </button>
  </div>
</div>

<!-- ===== MODAL QRIS ===== -->
<div id="qrisModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 flex flex-col items-center text-center relative animate-[scaleIn_0.3s_ease]">
    <h2 class="font-bold text-lg mb-3 text-gray-600">Bayar QRIS</h2>
    <p class="text-sm text-gray-600">Silakan scan QR berikut untuk membayar:</p>
    <div class="bg-gray-50 border rounded-xl p-5 shadow-inner mt-4 w-full">
      <img id="qrisImage" src="{{ asset('images/QRIS.jpg') }}" class="w-48 h-48 mx-auto" alt="QRIS Code">
    </div>
    <button id="closeQRModalBtn" 
      class="mt-6 w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-2.5 rounded-xl font-semibold shadow hover:opacity-90 transition">
      Oke, Saya Sudah Bayar
    </button>
  </div>
</div>

<!-- ===== MODAL KONFIRMASI SUKSES ===== -->
<div id="konfirmasiSuksesModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-6">
  <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8 flex flex-col gap-4 items-center text-center relative animate-[scaleIn_0.35s_ease]">

    <!-- Icon centang animasi -->
    <div class="w-24 h-24 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg">
      <svg class="w-12 h-12 text-white animate-[pop_0.4s_ease]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
      </svg>
    </div>

    <h2 class="font-bold text-2xl mt-2 text-gray-800">Pesanan Dikonfirmasi</h2>
    <p class="text-gray-600 text-sm">Terima kasih! Pesanan kamu berhasil dibuat.</p>
    <p class="text-gray-600 text-sm -mt-2">Segera ambil pesananmu di toko kami.</p>

    <button id="tutupKonfirmasiBtn" 
      class="mt-4 bg-gradient-to-r from-green-400 to-emerald-500 text-white py-2.5 px-6 rounded-xl font-semibold shadow hover:opacity-90 transition">
      Lanjutkan Penyewaan
    </button>

    <p class="text-xs text-gray-400 mt-2">ID Pesanan: 
      <span id="orderId" class="font-bold text-gray-700">#12345</span>
    </p>
  </div>
</div>

{{-- Load CSS & JS untuk pop_up --}}
<link rel="stylesheet" href="{{ asset('css/user/pop_up.css') }}">
<script src="{{ asset('js/user/pop_up.js') }}"></script>
