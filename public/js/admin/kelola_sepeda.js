document.addEventListener('DOMContentLoaded', function() {

    // Hapus sepeda dengan SweetAlert
    document.querySelectorAll('.hapus-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data sepeda akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#000000',
                cancelButtonColor: '#d1d5db',
                confirmButtonText: '<span style="color:white;">Ya, hapus!</span>',
                cancelButtonText: '<span style="color:black;">Batal</span>',
            }).then((result) => {
                if(result.isConfirmed) {
                    document.getElementById('hapus-form-' + id).submit();
                }
            });
        });
    });

    // Search
    const searchInput = document.getElementById('search');
    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        document.querySelectorAll('table tbody tr').forEach(row => {
            const nama = row.querySelector('td div div').textContent.toLowerCase();
            row.style.display = nama.includes(filter) ? '' : 'none';
        });
    });

    // Filter status
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            const status = button.textContent.trim();
            document.querySelectorAll('table tbody tr').forEach(row => {
                const rowStatus = row.querySelector('td:nth-child(3) span')?.textContent || '';
                row.style.display = (status === 'Semua Status' || rowStatus === status) ? '' : 'none';
            });
        });
    });

});