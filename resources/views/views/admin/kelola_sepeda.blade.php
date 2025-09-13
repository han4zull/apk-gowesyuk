<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Sepeda - GowesYuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-[#e9e9f9]">

    <!-- Navbar -->
    @include('admin.layout.navbar')  

    <div class="page-content p-6">
        <!-- Judul -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold">Kelola Sepeda</h1>
                <p class="text-gray-600">Kelola inventori sepeda rental anda.</p>
            </div>
          <a href="{{ route('admin.tambah_sepeda') }}" 
              class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-lg">
              + Tambah Sepeda
          </a>

        </div>

        <!-- Search & Filter -->
        <div class="flex items-center justify-between mb-6 bg-white p-3 rounded-lg shadow">
            <div class="relative w-1/3">
                <i class="fa fa-search absolute left-3 top-3 text-gray-400"></i>
                <input type="text" id="search" placeholder="Cari sepeda..."
                    class="pl-10 pr-3 py-2 border rounded-lg w-full">
            </div>
            <div class="space-x-2">
                <button class="px-4 py-2 bg-gray-200 rounded-lg">Semua Status</button>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg">Tersedia</button>
                <button class="px-4 py-2 bg-red-500 text-white rounded-lg">Disewa</button>
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Perawatan</button>
            </div>
        </div>

        <!-- Tabel Sepeda -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-3">Sepeda</th>
                        <th class="px-4 py-3">Jenis</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Perawatan Terakhir</th>
                        <th class="px-4 py-3">Stok</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sepeda as $s)
                        <tr class="border-b hover:bg-gray-50">
                            <!-- Sepeda (gambar + nama + kode) -->
                            <td class="px-4 py-3 flex items-center space-x-3">
                                @if($s->gambar_sepeda)
                                    <img src="{{ asset('storage/sepeda/' . $s->gambar_sepeda) }}" class="w-12 h-12 rounded object-contain bg-white-100 p-1">
                                @else
                                    <div class="w-12 h-12 bg-gray-200 flex items-center justify-center rounded">🚲</div>
                                @endif
                                <div>
                                    <div class="font-semibold">{{ $s->nama_sepeda }}</div>
                                    <div class="text-gray-500 text-sm">{{ $s->kode_sepeda }}</div>
                                </div>
                            </td>

                            <!-- Jenis -->
                            <td class="px-4 py-3">{{ $s->jenis_sepeda }}</td>

                            <!-- Status -->
                            <td class="px-4 py-3">
                                @if($s->status === 'tersedia')
                                    <span class="px-3 py-1 bg-green-600 text-white rounded-full text-sm">Tersedia</span>
                                @elseif($s->status === 'disewa')
                                    <span class="px-3 py-1 bg-red-500 text-white rounded-full text-sm">Disewa</span>
                                @else
                                    <span class="px-3 py-1 bg-yellow-500 text-white rounded-full text-sm">Perawatan</span>
                                @endif
                            </td>

                            <!-- Perawatan terakhir -->
                            <td class="px-4 py-3 flex items-center space-x-2 text-gray-600">
                                <i class="fa fa-wrench"></i>
                                <span>{{ $s->perawatan_terakhir ?? '-' }}</span>
                            </td>

                            <!-- Stok -->
                            <td class="px-4 py-3">{{ $s->stok ?? 0 }}</td>

                            <!-- Aksi -->
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('admin.edit_sepeda', $s->id) }}" class="text-blue-600 hover:text-blue-800">
                                  <i class="fa fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.hapus_sepeda', $s->id) }}" method="POST" class="hapus-form inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="text-red-600 hover:text-red-800">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
        const nama = row.querySelector('td div div').textContent.toLowerCase();
        if (nama.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.page-content button');
    const rows = document.querySelectorAll('table tbody tr');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const status = button.textContent.trim(); // Ambil teks tombol
            rows.forEach(row => {
                const rowStatus = row.querySelector('td:nth-child(3) span')?.textContent || '';
                
                if (status === 'Semua Status' || rowStatus === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.hapus-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // hentikan submit default
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
                if (result.isConfirmed) {
                    // AJAX request
                    fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                        body: new URLSearchParams(new FormData(form))
                    })
                    .then(response => {
                        if (response.ok) {
                            // Hapus baris dari tabel
                            form.closest('tr').remove();
                            Swal.fire('Berhasil!', 'Sepeda berhasil dihapus.', 'success');
                        } else {
                            Swal.fire('Gagal!', 'Gagal menghapus sepeda.', 'error');
                        }
                    })
                    .catch(() => {
                        Swal.fire('Gagal!', 'Terjadi kesalahan.', 'error');
                    });
                }
            });
        });
    });
});
</script>



</body>
</html>
