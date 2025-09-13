document.querySelectorAll('.akhiri-btn, .batal-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const status = this.dataset.status;
        const form = document.getElementById('confirmStatusForm');

        // Reset semua
        form.querySelector('input[name="_method"]').value = '';

        if(status === 'selesai'){
            form.action = `/admin/penyewaan/${id}/selesai`;
            form.method = 'POST';
        } else if(status === 'batal'){
            form.action = `/admin/penyewaan/${id}/batal`;
            form.method = 'POST';           
            form.querySelector('input[name="_method"]').value = 'DELETE';
        }

        // Ubah teks modal
        document.getElementById('statusModalTitle').textContent =
            status === 'selesai' ? 'Akhiri Penyewaan?' : 'Batalkan Penyewaan?';
        document.getElementById('statusModalText').textContent =
            status === 'selesai' ? 
            'Apakah Anda yakin ingin mengakhiri penyewaan ini?' :
            'Apakah Anda yakin ingin membatalkan penyewaan ini?';

        document.getElementById('statusModal').classList.remove('hidden');
    });
});

// Tambahkan ini untuk tombol Batal
document.getElementById('cancelStatus').addEventListener('click', function() {
    document.getElementById('statusModal').classList.add('hidden');
});