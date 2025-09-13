    document.addEventListener('DOMContentLoaded', function() {
    const successModal = document.getElementById('successModal');
    const closeBtn = document.getElementById('closeSuccessModal');
    const modalBox = successModal.querySelector('div'); // inner div

    if (localStorage.getItem('showLogoutSuccess') === 'true' && successModal) {
        // Tampilkan modal
        successModal.classList.remove('hidden');
        modalBox.classList.remove('scale-95', 'opacity-0');
        modalBox.classList.add('scale-100', 'opacity-100');

        // Hilangkan otomatis setelah 1,5 detik
        setTimeout(() => {
            modalBox.classList.remove('scale-100', 'opacity-100');
            modalBox.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                successModal.classList.add('hidden');
                localStorage.removeItem('showLogoutSuccess');
            }, 300);
        }, 1500);
    }

    // Tombol Tutup
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modalBox.classList.remove('scale-100', 'opacity-100');
            modalBox.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                successModal.classList.add('hidden');
                localStorage.removeItem('showLogoutSuccess');
            }, 300);
        });
    }
});

