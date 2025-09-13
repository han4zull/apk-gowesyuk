document.addEventListener('DOMContentLoaded', function () {
    // 🔍 Pencarian
    const searchInput = document.getElementById('search');
    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('table tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    }

    // Ambil CSRF token dari meta
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // ⚡ Fungsi toggle status
    window.toggleStatus = function(userId, newStatus) {
        Swal.fire({
            title: 'Anda yakin?',
            text: newStatus === 'nonaktif' 
                ? "Akun ini akan dinonaktifkan." 
                : "Akun ini akan diaktifkan kembali.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Ya, lanjutkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/pengguna/${userId}/status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(res => res.json())
                .then(data => {
                    Swal.fire('Berhasil!', data.message, 'success')
                        .then(() => location.reload());
                })
                .catch(err => {
                    Swal.fire('Error!', 'Terjadi kesalahan.', 'error');
                });
            }
        });
    };
});
