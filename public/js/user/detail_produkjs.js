document.addEventListener("DOMContentLoaded", function() {
    // ===== MODAL SEWA =====
    const rentalModal = document.getElementById("rentalModal");
    const paymentModal = document.getElementById("paymentModal");
    const sewaBtn = document.getElementById("openRentalBtn");
    const cancelBtn = document.getElementById("cancelBtn");
    const konfirmasiBtn = document.getElementById("konfirmasiBtn");
    const jamInput = document.getElementById("jamInput");
    const hariInput = document.getElementById("hariInput");
    const hargaJam = parseInt(document.getElementById("harga_jam")?.value) || 0;
    const hargaHari = parseInt(document.getElementById("harga_hari")?.value) || 0;
    const biayaAdmin = parseInt(document.getElementById("biaya_admin")?.value) || 0;

    function formatRupiah(angka){ 
        return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."); 
    }

    function updateTotal(){
        const totalSewa = (parseInt(jamInput.value)||0)*hargaJam + (parseInt(hariInput.value)||0)*hargaHari;
        const total = totalSewa + biayaAdmin;
        const elBiayaSewaEstimasi = document.getElementById("biayaSewaEstimasi");
        const elTotalEstimasi = document.getElementById("totalBiayaEstimasi");
        const elBiayaSummary = document.getElementById("biayaSewaSummary");
        const elTotalSummary = document.getElementById("totalBiayaSummary");

        if(elBiayaSewaEstimasi) elBiayaSewaEstimasi.textContent = formatRupiah(totalSewa);
        if(elTotalEstimasi) elTotalEstimasi.textContent = formatRupiah(total);
        if(elBiayaSummary) elBiayaSummary.textContent = formatRupiah(totalSewa);
        if(elTotalSummary) elTotalSummary.textContent = formatRupiah(total);
    }

    jamInput?.addEventListener("input", updateTotal);
    hariInput?.addEventListener("input", updateTotal);
    sewaBtn?.addEventListener("click", ()=> rentalModal.classList.remove("hidden"));
    cancelBtn?.addEventListener("click", ()=> rentalModal.classList.add("hidden"));
    konfirmasiBtn?.addEventListener("click", ()=>{
        if((parseInt(jamInput.value)||0)===0 && (parseInt(hariInput.value)||0)===0){
            alert("Durasi minimal 1 jam atau 1 hari!");
            return;
        }
        updateTotal();
        rentalModal.classList.add("hidden");
        paymentModal.classList.remove("hidden");
    });

    document.getElementById("helpBtn")?.addEventListener("click", ()=> window.open('tel:+6285187803375','_self'));

    // ===== MODAL SUKSES TAMBAH KERANJANG =====
    const cartForm = document.getElementById('cartForm');
    const cartModal = document.getElementById('cartSuccessModal');
    const closeCartModal = document.getElementById('closeCartModal');

    if(cartForm && cartModal && closeCartModal){
        const csrfToken = cartForm.dataset.csrf;

        cartForm.addEventListener('submit', function(e){
            e.preventDefault();

            fetch(cartForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    sepeda_id: cartForm.querySelector('[name="sepeda_id"]').value
                })
            })
            .then(res => {
                if(res.ok){
                    cartModal.classList.remove('hidden');
                } else {
                    alert('Gagal menambahkan ke keranjang.');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan.');
            });
        });

        closeCartModal.addEventListener('click', ()=> cartModal.classList.add('hidden'));
    }
});
