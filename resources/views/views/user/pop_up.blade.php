<!-- ===== MODAL SEWA ===== -->
<div id="rentalModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-8">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-6 flex gap-4 relative max-h-[102vh] overflow-y-auto">

    <!-- Kiri: Gambar & info sepeda -->
    <div class="flex flex-col gap-2 w-1/2">
      <span class="text-[9px] bg-gray-200 rounded-full px-2 py-0.5 inline-block">
        {{ strtoupper($sepeda->jenis_sepeda) }}
      </span>
      <img src="{{ asset('images/sepeda/' . $sepeda->gambar_sepeda) }}" class="w-full h-48 object-contain rounded-lg border">
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
      <button class="flex-1 border rounded-lg py-1 text-xs hover:bg-gray-100" data-method="e-wallet">Dompet Digital</button>
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


<!-- ===== MODAL KONFIRMASI SUKSES ===== -->
<div id="konfirmasiSuksesModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-8">
  <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 flex flex-col gap-4 items-center text-center relative">
    
    <!-- Icon centang -->
    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center">
      <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
      </svg>
    </div>

    <h2 class="font-bold text-lg mt-2">Pesanan Dikonfirmasi</h2>
    <p>Terima kasih! Pesanan Anda telah dikonfirmasi.</p>
    <p>Segera Ambil Pesanan Anda ke Toko Kami.</p>

    <button id="tutupKonfirmasiBtn" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Lanjutkan Penyewaan</button>

    <p class="text-xs mt-2">ID Pesanan: <span id="orderId">12345</span></p>

  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const rentalModal = document.getElementById("rentalModal");
  const paymentModal = document.getElementById("paymentModal");
  const konfirmasiModal = document.getElementById("konfirmasiSuksesModal");

  const sewaBtn = document.getElementById("openRentalBtn");
  const cancelBtn = document.getElementById("cancelBtn");
  const konfirmasiBtn = document.getElementById("konfirmasiBtn");
  const submitSewaBtn = document.getElementById("submitSewaBtn");
  const sewaForm = document.getElementById("sewaForm");
  const metodeInput = document.getElementById("metodeInput");

  const jamInput = document.getElementById("jamInput");
  const hariInput = document.getElementById("hariInput");
  const hargaJam = parseInt(document.getElementById("harga_jam").value) || 0;
  const hargaHari = parseInt(document.getElementById("harga_hari").value) || 0;
  const biayaAdmin = parseInt(document.getElementById("biaya_admin").value) || 0;

  // estimasi box (modal sewa)
  const biayaSewaEstimasiEl = document.getElementById("biayaSewaEstimasi");
  const totalBiayaEstimasiEl = document.getElementById("totalBiayaEstimasi");

  // summary box (modal payment)
  const biayaSewaSummaryEl = document.getElementById("biayaSewaSummary");
  const totalBiayaSummaryEl = document.getElementById("totalBiayaSummary");

  function formatRupiah(angka){ 
    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."); 
  }

  function updateTotal(){
    const jam = parseInt(jamInput.value) || 0;
    const hari = parseInt(hariInput.value) || 0;
    const totalSewa = (jam*hargaJam)+(hari*hargaHari);
    const total = totalSewa + biayaAdmin;

    // update box di rental modal
    if (biayaSewaEstimasiEl) biayaSewaEstimasiEl.textContent = formatRupiah(totalSewa);
    if (totalBiayaEstimasiEl) totalBiayaEstimasiEl.textContent = formatRupiah(total);

    // update box di payment modal
    if (biayaSewaSummaryEl) biayaSewaSummaryEl.textContent = formatRupiah(totalSewa);
    if (totalBiayaSummaryEl) totalBiayaSummaryEl.textContent = formatRupiah(total);
  }

  jamInput.addEventListener("input", updateTotal);
  hariInput.addEventListener("input", updateTotal);

  if(sewaBtn) sewaBtn.addEventListener("click", ()=> rentalModal.classList.remove("hidden"));
  if(cancelBtn) cancelBtn.addEventListener("click", ()=> rentalModal.classList.add("hidden"));

  konfirmasiBtn.addEventListener("click", ()=>{
    if((parseInt(jamInput.value)||0)===0 && (parseInt(hariInput.value)||0)===0){
      alert("Durasi minimal 1 jam atau 1 hari!");
      return;
    }
    updateTotal();
    rentalModal.classList.add("hidden");
    paymentModal.classList.remove("hidden");
  });

  // Pilih metode pembayaran dengan layout logo persis
  paymentModal.querySelectorAll('button[data-method]').forEach(btn=>{
    btn.addEventListener("click", ()=>{
      const method = btn.dataset.method;
      metodeInput.value = method;
      const content = document.getElementById('paymentContent');
      if(method==='cod'){
        content.innerHTML = `<p class="text-sm font-medium mt-4">Bayar Ditempat</p>`;
      } else if(method==='bank'){
        content.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
          <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/bca.png" class="w-6 h-6">BCA</label>
          <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/bni.png" class="w-6 h-6">BNI</label>
          <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/mandiri.png" class="w-6 h-6">Mandiri</label>
          <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/bri.png" class="w-6 h-6">BRI</label>
        </div>`;
      } else if(method==='e-wallet'){
        content.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
          <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/dana.png" class="w-6 h-6">DANA</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/ovo.png" class="w-6 h-6">OVO</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/gopay.png" class="w-6 h-6">GoPay</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/qris.png" class="w-6 h-6">QRIS</label>
        </div>`;
      }
    });
  });

  document.getElementById("cancelBtnPayment").addEventListener("click", ()=>{
    paymentModal.classList.add("hidden");
    rentalModal.classList.remove("hidden");
  });

  document.getElementById("buatPesananBtn").addEventListener("click", ()=>{
    if(!metodeInput.value){
        alert("Pilih metode pembayaran dulu!");
        return;
    }
    sewaForm.submit(); // langsung submit ke Laravel
  });

  document.getElementById("tutupKonfirmasiBtn").addEventListener("click", ()=>{
    konfirmasiModal.classList.add("hidden");
    submitSewaBtn.click();
  });

  updateTotal(); // inisialisasi biaya
});
</script>
