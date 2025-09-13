<!-- ===== MODAL METODE PEMBAYARAN ===== -->
<div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-8">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-6 flex flex-col gap-4 relative">
    
    <h2 class="font-bold text-lg">Metode Pembayaran</h2>

    <!-- Pilihan metode -->
    <div class="flex gap-2 mt-6">
      <button class="flex-1 border rounded-lg py-1 text-xs hover:bg-gray-100" data-method="cod">Bayar Ditempat</button>
      <button class="flex-1 border rounded-lg py-1 text-xs hover:bg-gray-100" data-method="bank">Transfer Bank</button>
      <button class="flex-1 border rounded-lg py-1 text-xs hover:bg-gray-100" data-method="e-wallet">Dompet Digital</button>
    </div>

    <!-- Konten metode pembayaran -->
    <div class="border-t mt-2 pt-2 pb-4" id="paymentContent">
      <p class="text-sm font-medium mt-4">Bayar Ditempat</p>
    </div>

    <!-- Ringkasan biaya -->
    <div class="bg-blue-50 p-3 rounded-lg text-xs mt-2 self-end w-48" id="summaryBox">
      <div class="flex justify-between"><span>Sewa</span><span id="sewaBiaya">Rp 0</span></div>
      <div class="flex justify-between"><span>Biaya Layanan</span><span id="layananBiaya">Rp 3.000</span></div>
      <hr class="my-1">
      <div class="flex justify-between font-bold"><span>Total</span><span id="totalBiaya">Rp 3.000</span></div>
    </div>

    <!-- Tombol aksi -->
    <div class="flex justify-between gap-2 mt-2">
      <button id="cancelBtn" class="flex-1 border py-2 rounded-lg hover:bg-gray-100 text-xs">Batal</button>
      <button id="buatPesananBtn" class="flex-1 bg-black text-white py-2 rounded-lg hover:bg-gray-800 text-xs">Buat Pesanan</button>
    </div>
  </div>
</div>

<!-- Product Description -->
  @include('metode')


<script>
const rentalModal = document.getElementById('rentalModal');   
const paymentModal = document.getElementById('paymentModal'); 
const konfirmasiBtn = rentalModal.querySelector('button.bg-black'); 
const cancelBtn = paymentModal.querySelector('#cancelBtn'); 
const buatPesananBtn = paymentModal.querySelector('#buatPesananBtn'); 
const sewaForm = document.getElementById('sewaForm');

const jamInput = document.getElementById("jamInput");
const hariInput = document.getElementById("hariInput");
const hargaJam = parseInt(document.getElementById("harga_jam").value) || 0;
const hargaHari = parseInt(document.getElementById("harga_hari").value) || 0;
const biayaAdmin = parseInt(document.getElementById("biaya_admin").value) || 0;

// Ringkasan biaya
const sewaBiayaEl = document.getElementById("sewaBiaya");
const layananBiayaEl = document.getElementById("layananBiaya");
const totalBiayaEl = document.getElementById("totalBiaya");

function formatRupiah(angka){
  return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g,".");
}

function updateSummary(){
  let jam = parseInt(jamInput.value) || 0;
  let hari = parseInt(hariInput.value) || 0;
  let sewaTotal = jam*hargaJam + hari*hargaHari;
  sewaBiayaEl.textContent = formatRupiah(sewaTotal);
  let total = sewaTotal + biayaAdmin;
  totalBiayaEl.textContent = formatRupiah(total);
}

// Validasi dan buka modal metode
konfirmasiBtn.addEventListener('click', (e) => {
  e.preventDefault();
  let jam = parseInt(jamInput.value) || 0;
  let hari = parseInt(hariInput.value) || 0;
  if(jam===0 && hari===0){
    Swal.fire({
      icon:'warning',
      title:'Durasi tidak valid',
      text:'Minimal sewa adalah 1 jam atau 1 hari!',
      confirmButtonText:'Oke',
      confirmButtonColor:'#000'
    });
    return;
  }
  rentalModal.classList.add('hidden');
  paymentModal.classList.remove('hidden');
  updateSummary();
});

// Tombol Batal
cancelBtn.addEventListener('click', () => {
  paymentModal.classList.add('hidden');
  rentalModal.classList.remove('hidden');
});

// Pilihan metode
const paymentButtons = paymentModal.querySelectorAll('button[data-method]');
const paymentContent = document.getElementById('paymentContent');

paymentButtons.forEach(btn=>{
  btn.addEventListener('click',()=>{
    const method = btn.dataset.method;
    if(method==='cod'){
      paymentContent.innerHTML = `<p class="text-sm font-medium mt-4">Bayar Ditempat</p>`;
    }else if(method==='bank'){
      paymentContent.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
        <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/bca.png" class="w-6 h-6">BCA</label>
        <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/bni.png" class="w-6 h-6">BNI</label>
        <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/mandiri.png" class="w-6 h-6">Mandiri</label>
        <label class="flex items-center gap-2"><input type="radio" name="bank"><img src="/images/logo/bri.png" class="w-6 h-6">BRI</label>
      </div>`;
    }else if(method==='e-wallet'){
      paymentContent.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
        <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/dana.png" class="w-6 h-6">DANA</label>
        <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/ovo.png" class="w-6 h-6">OVO</label>
        <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/gopay.png" class="w-6 h-6">GoPay</label>
        <label class="flex items-center gap-2"><input type="radio" name="ewallet"><img src="/images/logo/qris.png" class="w-6 h-6">QRIS</label>
      </div>`;
    }
  });
});

// Submit form
buatPesananBtn.addEventListener('click',()=>{
  // Ambil metode
  let metode = paymentModal.querySelector('input[type="radio"]:checked')?.name || 'cod';

  // Tambah hidden input
  let metodeInput = sewaForm.querySelector('input[name="metode"]');
  if(!metodeInput){
    metodeInput = document.createElement('input');
    metodeInput.type='hidden';
    metodeInput.name='metode';
    sewaForm.appendChild(metodeInput);
  }
  metodeInput.value = metode;

  sewaForm.submit();
});
</script>
