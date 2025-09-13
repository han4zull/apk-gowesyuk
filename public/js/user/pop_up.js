document.addEventListener("DOMContentLoaded", function () {
  const rentalModal = document.getElementById("rentalModal");
  const paymentModal = document.getElementById("paymentModal");
  const konfirmasiModal = document.getElementById("konfirmasiSuksesModal");

  const vaModal = document.getElementById("vaModal");
  const vaNumberEl = document.getElementById("vaNumber");
  const qrisModal = document.getElementById("qrisModal");
  const qrisImageEl = document.getElementById("qrisImage");

  const sewaBtn = document.getElementById("openRentalBtn");
  const cancelBtn = document.getElementById("cancelBtn");
  const konfirmasiBtn = document.getElementById("konfirmasiBtn");
  const sewaForm = document.getElementById("sewaForm");
  const metodeInput = document.getElementById("metodeInput");

  const jamInput = document.getElementById("jamInput");
  const hariInput = document.getElementById("hariInput");
  const hargaJam = parseInt(document.getElementById("harga_jam").value) || 0;
  const hargaHari = parseInt(document.getElementById("harga_hari").value) || 0;
  const biayaAdmin = parseInt(document.getElementById("biaya_admin").value) || 0;

  const biayaSewaEstimasiEl = document.getElementById("biayaSewaEstimasi");
  const totalBiayaEstimasiEl = document.getElementById("totalBiayaEstimasi");
  const biayaSewaSummaryEl = document.getElementById("biayaSewaSummary");
  const totalBiayaSummaryEl = document.getElementById("totalBiayaSummary");

  // ===== SET MIN TANGGAL =====
  const tanggalInput = document.querySelector('input[name="tanggal"]');
  if (tanggalInput) {
    const today = new Date().toISOString().split('T')[0];
    tanggalInput.setAttribute('min', today);
  }

  function formatRupiah(angka) {
    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function updateTotal() {
    const jam = parseInt(jamInput.value) || 0;
    const hari = parseInt(hariInput.value) || 0;
    const totalSewa = (jam * hargaJam) + (hari * hargaHari);
    const total = totalSewa + biayaAdmin;

    if (biayaSewaEstimasiEl) biayaSewaEstimasiEl.textContent = formatRupiah(totalSewa);
    if (totalBiayaEstimasiEl) totalBiayaEstimasiEl.textContent = formatRupiah(total);
    if (biayaSewaSummaryEl) biayaSewaSummaryEl.textContent = formatRupiah(totalSewa);
    if (totalBiayaSummaryEl) totalBiayaSummaryEl.textContent = formatRupiah(total);
  }

  jamInput.addEventListener("input", updateTotal);
  hariInput.addEventListener("input", updateTotal);

  if (sewaBtn) sewaBtn.addEventListener("click", () => rentalModal.classList.remove("hidden"));
  if (cancelBtn) cancelBtn.addEventListener("click", () => rentalModal.classList.add("hidden"));

  konfirmasiBtn.addEventListener("click", () => {
    if ((parseInt(jamInput.value) || 0) === 0 && (parseInt(hariInput.value) || 0) === 0) {
      alert("Durasi minimal 1 jam atau 1 hari!");
      return;
    }
    updateTotal();
    rentalModal.classList.add("hidden");
    paymentModal.classList.remove("hidden");
  });

  // ===== PILIH METODE PEMBAYARAN =====
  paymentModal.querySelectorAll('button[data-method]').forEach(btn => {
    btn.addEventListener("click", () => {
      const method = btn.dataset.method;
      metodeInput.value = method;
      const content = document.getElementById('paymentContent');

      // reset hidden input
      document.getElementById("bankInput").value = "";
      document.getElementById("ewalletInput").value = "";

      if (method === 'cod') {
        content.innerHTML = `<p class="text-sm font-medium mt-4">Bayar Ditempat</p>`;
      } else if (method === 'bank') {
        content.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
          <label class="flex items-center gap-2"><input type="radio" name="bankOption" value="bca"> <img src="/images/logo/bca.png" class="w-6 h-6">BCA</label>
          <label class="flex items-center gap-2"><input type="radio" name="bankOption" value="bni"> <img src="/images/logo/bni.png" class="w-6 h-6">BNI</label>
          <label class="flex items-center gap-2"><input type="radio" name="bankOption" value="mandiri"> <img src="/images/logo/mandiri.png" class="w-6 h-6">Mandiri</label>
          <label class="flex items-center gap-2"><input type="radio" name="bankOption" value="bri"> <img src="/images/logo/bri.png" class="w-6 h-6">BRI</label>
        </div>`;
        content.querySelectorAll('input[name="bankOption"]').forEach(r => {
          r.addEventListener("change", () => {
            document.getElementById("bankInput").value = r.value;
          });
        });
      } else if (method === 'ewallet') {
        content.innerHTML = `<div class="grid grid-cols-2 gap-2 mt-2">
          <label class="flex items-center gap-2"><input type="radio" name="ewalletOption" value="dana"> <img src="/images/logo/dana.png" class="w-6 h-6">DANA</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewalletOption" value="ovo"> <img src="/images/logo/ovo.png" class="w-6 h-6">OVO</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewalletOption" value="gopay"> <img src="/images/logo/gopay.png" class="w-6 h-6">GoPay</label>
          <label class="flex items-center gap-2"><input type="radio" name="ewalletOption" value="qris"> <img src="/images/logo/qris.png" class="w-6 h-6">QRIS</label>
        </div>`;
        content.querySelectorAll('input[name="ewalletOption"]').forEach(r => {
          r.addEventListener("change", () => {
            document.getElementById("ewalletInput").value = r.value;
          });
        });
      }
    });
  });

  // ===== SUBMIT PESANAN =====
  document.getElementById("buatPesananBtn").addEventListener("click", () => {
    if (!metodeInput.value) {
      alert("Pilih metode pembayaran dulu!");
      return;
    }

    const formData = new FormData(sewaForm);
    const bankRadio = sewaForm.querySelector('input[name="bank"]:checked');
    const ewalletRadio = sewaForm.querySelector('input[name="ewallet"]:checked');

    if (bankRadio) formData.append('bank', bankRadio.value);
    if (ewalletRadio) formData.append('ewallet', ewalletRadio.value);

    fetch(sewaForm.action, {
      method: "POST",
      body: formData,
      headers: { "X-Requested-With": "XMLHttpRequest" }
    })
    .then(res => res.json())
    .then(data => {
      console.log("Response data:", data);
      if (!data.success) return alert(data.message || "Gagal membuat pesanan!");

      if (data.order_id) {
        document.getElementById("orderId").textContent = "" + data.order_id;
      }

      // BANK / E-WALLET selain QRIS
      if (data.metode === "bank" || (data.metode === "ewallet" && data.ewallet !== "qris")) {
        vaNumberEl.textContent = data.va_number;
        paymentModal.classList.add("hidden");
        vaModal.classList.remove("hidden");

      // E-WALLET QRIS
      } else if (data.metode === "ewallet" && data.ewallet === "qris") {
        paymentModal.classList.add("hidden");
        qrisModal.classList.remove("hidden");

      // COD
      } else if (data.metode === "cod") {
        paymentModal.classList.add("hidden");
        konfirmasiModal.classList.remove("hidden");
      }

    })
    .catch(err => {
      console.error(err);
      alert("Terjadi kesalahan saat membuat pesanan.");
    });
  });

  // ===== TUTUP MODAL =====
  document.getElementById("cancelBtnPayment").addEventListener("click", () => {
    paymentModal.classList.add("hidden");
    rentalModal.classList.remove("hidden");
  });
  document.getElementById("closeVAModalBtn").addEventListener("click", () => {
    vaModal.classList.add("hidden");
    konfirmasiModal.classList.remove("hidden");
  });
  document.getElementById("closeQRModalBtn").addEventListener("click", () => {
    qrisModal.classList.add("hidden");
    konfirmasiModal.classList.remove("hidden");
  });
  document.getElementById("tutupKonfirmasiBtn").addEventListener("click", () => {
    konfirmasiModal.classList.add("hidden");
    window.location.href = "/sewa_sepeda";
  });

  updateTotal();
});