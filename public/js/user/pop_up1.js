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

  if(konfirmasiBtn) konfirmasiBtn.addEventListener("click", ()=>{
    if((parseInt(jamInput.value)||0)===0 && (parseInt(hariInput.value)||0)===0){
      alert("Durasi minimal 1 jam atau 1 hari!");
      return;
    }
    updateTotal();
    rentalModal.classList.add("hidden");
    paymentModal.classList.remove("hidden");
  });

  let selectedBank = null;
  let selectedEwallet = null;

  // Pilih metode pembayaran
  paymentModal.querySelectorAll('button[data-method]').forEach(btn=>{
    btn.addEventListener("click", ()=>{
      const method = btn.dataset.method;
      metodeInput.value = method;
      selectedBank = null;
      selectedEwallet = null;
      const content = document.getElementById('paymentContent');
      if(method==='cod'){
        content.innerHTML = '<p class="text-sm font-medium mt-4">Bayar Ditempat<br><span class="text-xs text-gray-500">Pembayaran dilakukan langsung saat pengambilan sepeda di toko.</span></p>';
      } else if(method==='bank'){
        content.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
          <label class="flex items-center gap-2"><input type="radio" name="bank" value="bca"><img src="/images/logo/bca.png" class="w-6 h-6">BCA</label>
          <label class="flex items-center gap-2"><input type="radio" name="bank" value="bni"><img src="/images/logo/bni.png" class="w-6 h-6">BNI</label>
          <label class="flex items-center gap-2"><input type="radio" name="bank" value="mandiri"><img src="/images/logo/mandiri.png" class="w-6 h-6">Mandiri</label>
          <label class="flex items-center gap-2"><input type="radio" name="bank" value="bri"><img src="/images/logo/bri.png" class="w-6 h-6">BRI</label>
        </div>
        <div class='mt-2 text-xs text-gray-500 text-center'>Setelah transfer, upload bukti pembayaran di halaman profil atau kirim ke WhatsApp admin.</div>`;
        // Set default checked
        setTimeout(() => {
          const radios = content.querySelectorAll('input[name="bank"]');
          if(radios[0]) radios[0].checked = true;
          selectedBank = radios[0] ? radios[0].value : null;
          document.getElementById('bankInput').value = selectedBank;
          radios.forEach(radio => {
            radio.addEventListener('change', function() {
              selectedBank = this.value;
              document.getElementById('bankInput').value = selectedBank;
            });
          });
        }, 50);
      } else if(method==='e-wallet'){
        content.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
          <label class="flex items-center gap-2"><input type="radio" name="ewallet" value="dana"><img src="/images/logo/dana.png" class="w-6 h-6">DANA</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewallet" value="ovo"><img src="/images/logo/ovo.png" class="w-6 h-6">OVO</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewallet" value="gopay"><img src="/images/logo/gopay.png" class="w-6 h-6">GoPay</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewallet" value="qris"><img src="/images/logo/qris.png" class="w-6 h-6">QRIS</label>
        </div>
        <div class='mt-2 text-xs text-gray-500'>Setelah transfer, upload bukti pembayaran di halaman profil atau kirim ke WhatsApp admin.</div>`;
        setTimeout(() => {
          const radios = content.querySelectorAll('input[name="ewallet"]');
          if(radios[0]) radios[0].checked = true;
          selectedEwallet = radios[0] ? radios[0].value : null;
          document.getElementById('ewalletInput').value = selectedEwallet;
          radios.forEach(radio => {
            radio.addEventListener('change', function() {
              selectedEwallet = this.value;
              document.getElementById('ewalletInput').value = selectedEwallet;
            });
          });
        }, 50);
      }
    });
  });

  const cancelBtnPayment = document.getElementById("cancelBtnPayment");
  if(cancelBtnPayment) cancelBtnPayment.addEventListener("click", ()=>{
    paymentModal.classList.add("hidden");
    rentalModal.classList.remove("hidden");
  });

  // Tombol Buat Pesanan 
const buatPesananBtn = document.getElementById("buatPesananBtn");
if(buatPesananBtn) buatPesananBtn.addEventListener("click", function() {
  if(!metodeInput.value){
    alert("Pilih metode pembayaran dulu!");
    return;
  }

  if(metodeInput.value === 'cod') {
    document.getElementById("sewaForm").submit(); // <-- submit dulu
    paymentModal.classList.add('hidden');
    document.getElementById('konfirmasiSuksesModal').classList.remove('hidden');
    return;
  }

  if(metodeInput.value === 'bank') {
    let bank = selectedBank || document.querySelector('#paymentContent input[name="bank"]:checked')?.value;
    if(!bank) { alert("Pilih bank terlebih dahulu!"); return; }
    document.getElementById('bankInput').value = bank;
    document.getElementById("sewaForm").submit(); // <-- submit dulu
    paymentModal.classList.add('hidden');

    let bankName = 'BCA', bankLogo = '/images/logo/bca.png', vaNum = '1234 5678 9012 3456';
    if(bank==='bni'){ bankName='BNI'; bankLogo='/images/logo/bni.png'; vaNum='9876 5432 1098 7654'; }
    if(bank==='mandiri'){ bankName='Mandiri'; bankLogo='/images/logo/mandiri.png'; vaNum='1122 3344 5566 7788'; }
    if(bank==='bri'){ bankName='BRI'; bankLogo='/images/logo/bri.png'; vaNum='5566 7788 9900 1122'; }

    document.getElementById('vaBankLogo').src = bankLogo;
    document.getElementById('vaBankName').textContent = bankName;
    document.getElementById('vaNumber').textContent = vaNum;
    document.getElementById('virtualAccountModal').classList.remove('hidden');
    return;
  }

  if(metodeInput.value === 'e-wallet') {
    let ew = selectedEwallet || document.querySelector('#paymentContent input[name="ewallet"]:checked')?.value;
    if(!ew) { alert("Pilih dompet digital terlebih dahulu!"); return; }
    document.getElementById('ewalletInput').value = ew;
    document.getElementById("sewaForm").submit(); // <-- submit dulu

    if(ew === 'qris') {
      paymentModal.classList.add('hidden');
      document.getElementById('qrisModal').classList.remove('hidden');
      return;
    }

    paymentModal.classList.add('hidden');
    document.getElementById('konfirmasiSuksesModal').classList.remove('hidden');
    return;
  }
});

// Tombol QRIS lanjut
const lanjutQrisBtn = document.getElementById('lanjutQrisBtn');
if(lanjutQrisBtn){
  lanjutQrisBtn.onclick = function() {
    document.getElementById('qrisModal').classList.add('hidden');
    document.getElementById('konfirmasiSuksesModal').classList.remove('hidden');
  }
}

// Tombol VA lanjut
const closeVaModalBtn = document.getElementById('closeVaModalBtn');
if(closeVaModalBtn){
  closeVaModalBtn.textContent = "Lanjutkan";
  closeVaModalBtn.onclick = function() {
    document.getElementById('virtualAccountModal').classList.add('hidden');
    document.getElementById('konfirmasiSuksesModal').classList.remove('hidden');
  }
}

// Tutup modal sukses
const tutupKonfirmasiBtn = document.getElementById("tutupKonfirmasiBtn");
if(tutupKonfirmasiBtn) tutupKonfirmasiBtn.addEventListener("click", ()=>{
  document.getElementById("konfirmasiSuksesModal").classList.add("hidden");
});

// Copy VA number
document.getElementById('copyVaBtn').onclick = function() {
  const vaNumber = document.getElementById('vaNumber');
  const text = vaNumber.textContent.replace(/\s/g, '');
  navigator.clipboard.writeText(text);
  this.textContent = "Disalin!";
  setTimeout(()=>{ this.textContent = "Salin Nomor"; }, 1500);
}
});