<!-- ===== MODAL SEWA (taruh di akhir body, sebelum footer) ===== -->
<div id="rentalModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-8">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-6 flex gap-4 relative max-h-[102vh] overflow-y-auto">

    <!-- Kiri: Gambar & info sepeda -->
    <div class="flex flex-col gap-2 w-1/2">
      <span class="text-[9px] bg-gray-200 rounded-full px-2 py-0.5 inline-block">
        {{ strtoupper($sepeda->jenis_sepeda) }}
      </span>

      <img src="{{ asset('images/sepeda/' . $sepeda->gambar_sepeda) }}"
           alt="{{ $sepeda->nama_sepeda }}" 
           class="w-full h-48 object-contain rounded-lg border">

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
    <form id="sewaForm" 
          action="{{ route('penyewaan.store', $sepeda->id) }}" 
          method="POST" 
          class="flex flex-col gap-3 w-1/2 bg-white p-4 rounded-xl shadow-md">
      @csrf

      <!-- Hidden data -->
      <input type="hidden" name="id_sepeda" value="{{ $sepeda->id }}">
      <input type="hidden" name="nama_sepeda" value="{{ $sepeda->nama_sepeda }}">
      <input type="hidden" name="jenis_sepeda" value="{{ $sepeda->jenis_sepeda }}">
      <input type="hidden" name="kode_sepeda" value="{{ $sepeda->kode_sepeda }}">
      <input type="hidden" id="harga_jam" name="harga_jam" value="{{ $sepeda->harga_jam ?? 0 }}">
      <input type="hidden" id="harga_hari" name="harga_hari" value="{{ $sepeda->harga_hari ?? 0 }}">
      <input type="hidden" id="biaya_admin" name="biaya_admin" value="3000">

      <!-- Detail Penyewaan -->
      <h3 class="font-semibold text-sm border-b pb-1">Detail Penyewaan</h3>
      <div class="grid grid-cols-3 gap-2">
        <div>
          <label class="block text-[12px] font-medium">Tanggal</label>
          <input type="date" name="tanggal" required 
                 class="w-full border rounded-lg p-1.5 mt-1 text-xs">
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

      <!-- Informasi Penyewa -->
      <h3 class="font-semibold text-sm border-b pb-1">Informasi Penyewa</h3>
      <div>
        <label class="block text-[12px] font-medium">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required 
               placeholder="Isi nama anda" 
               class="w-full border rounded-lg p-1.5 mt-1 text-xs">
      </div>
      <div>
        <label class="block text-[12px] font-medium">Alamat</label>
        <input type="text" name="alamat" required 
               placeholder="Alamat" 
               class="w-full border rounded-lg p-1.5 mt-1 text-xs">
      </div>
      <div>
        <label class="block text-[12px] font-medium">Email</label>
        <input type="email" name="email" required 
               placeholder="Email aktif" 
               class="w-full border rounded-lg p-1.5 mt-1 text-xs">
      </div>
      <div>
        <label class="block text-[12px] font-medium">Nomor Telepon</label>
        <input type="tel" name="nomor_telepon" required 
               placeholder="08xxxxxxxxxx" 
               class="w-full border rounded-lg p-1.5 mt-1 text-xs">
      </div>

      <!-- Estimasi Biaya -->
      <div class="bg-blue-50 p-2 rounded-lg text-xs mt-1" id="estimasiBox">
        <div class="flex justify-between">
          <span>Sewa</span>
          <span id="biayaSewa">Rp {{ number_format($sepeda->harga_hari,0,',','.') }}</span>
        </div>
        <div class="flex justify-between">
          <span>Biaya Layanan</span><span>Rp 3000</span>
        </div>
        <hr class="my-1">
        <div class="flex justify-between font-bold">
          <span>Total</span>
          <span id="totalBiaya">Rp {{ number_format($sepeda->harga_hari + 3000,0,',','.') }}</span>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div class="flex justify-between gap-2 mt-2">
        <button type="button" id="cancelBtn" 
                class="w-1/2 border py-1.5 rounded-lg hover:bg-gray-100 text-xs">
          Batal
        </button>
        <button type="submit" id="konfirmasiBtn" 
                class="w-1/2 bg-black text-white py-1.5 rounded-lg hover:bg-gray-800 text-xs">
          Konfirmasi
        </button>
      </div>
    </form>
  </div>
</div>

<!-- ===== SCRIPT MODAL & HITUNG ===== -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const rentalModal = document.getElementById("rentalModal");
    const sewaBtn = document.getElementById("openRentalBtn"); // tombol di detail_produk
    const cancelBtn = document.getElementById("cancelBtn");

    if(sewaBtn){
        sewaBtn.addEventListener("click", () => {
            rentalModal.classList.remove("hidden");
        });
    }

    if(cancelBtn){
        cancelBtn.addEventListener("click", () => {
            rentalModal.classList.add("hidden");
        });
    }

    // Hitung biaya
    const jamInput   = document.getElementById("jamInput");
    const hariInput  = document.getElementById("hariInput");
    const hargaJam   = parseInt(document.getElementById("harga_jam").value) || 0;
    const hargaHari  = parseInt(document.getElementById("harga_hari").value) || 0;
    const biayaAdmin = parseInt(document.getElementById("biaya_admin").value) || 0;

    const biayaSewaEl = document.getElementById("biayaSewa");
    const totalBiayaEl = document.getElementById("totalBiaya");

    function formatRupiah(angka) {
        return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function updateTotal() {
        let jam = parseInt(jamInput.value) || 0;
        let hari = parseInt(hariInput.value) || 0;
        let totalSewa = (jam * hargaJam) + (hari * hargaHari);
        let total = totalSewa + biayaAdmin;
        biayaSewaEl.textContent = formatRupiah(totalSewa);
        totalBiayaEl.textContent = formatRupiah(total);
    }

    jamInput.addEventListener("change", updateTotal);
    hariInput.addEventListener("change", updateTotal);
});
</script>
