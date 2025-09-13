<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sepeda - GowesYuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    @include('admin.layout.navbar')

    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Sepeda Baru</h1>

            <form action="{{ route('admin.tambah_sepeda') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Jenis Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Jenis Sepeda</label>
                    <select name="jenis_sepeda" required
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Gunung">Gunung</option>
                        <option value="Balap">Balap</option>
                        <option value="Lipat">Lipat</option>
                        <option value="Hybrid">Hybrid</option>
                        <option value="Listrik">Listrik</option>
                        <option value="BMX">BMX</option>
                        <option value="Cruiser">Cruiser</option>
                        <option value="Fixie">Fixie</option>
                        <option value="Anak">Anak</option>
                        <option value="Tandem">Tandem</option>
                    </select>
                </div>

                <!-- Nama Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Sepeda</label>
                    <input type="text" name="nama_sepeda" required
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status" required
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Status --</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Perawatan">Perawatan</option>
                    </select>
                </div>

                <!-- Kode Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Kode Sepeda</label>
                    <input type="text" name="kode_sepeda" required
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Harga Hari & Harga Jam -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Harga per Hari</label>
                        <input type="number" name="harga_hari" required
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Harga per Jam</label>
                        <input type="number" name="harga_jam" required
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Deskripsi Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Deskripsi Sepeda</label>
                    <textarea name="deskripsi_sepeda" rows="4"
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Deskripsi singkat tentang sepeda..."></textarea>
                </div>

                <!-- Gambar Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Gambar Sepeda</label>
                    <input type="file" name="gambar_sepeda" id="gambarInput" accept="image/*"
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <div class="mt-3">
                        <img id="previewGambar" class="w-48 rounded shadow hidden" alt="Preview Gambar">
                    </div>
                </div>

                <!-- Tag Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Tag Sepeda</label>
                    <input type="text" name="tag_sepeda" placeholder="contoh: ringan, cepat, cocok offroad"
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Perawatan Terakhir & Stok -->
<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-gray-700 font-medium mb-1">Perawatan Terakhir</label>
        <input type="date" name="perawatan_terakhir"
            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
        <label class="block text-gray-700 font-medium mb-1">Stok Sepeda</label>
        <input type="number" name="stok" value="0"
            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
</div>


                <!-- Tombol -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('admin.kelola_sepeda') }}"
                        class="px-5 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Batal</a>
                    <button type="submit"
                        class="px-5 py-2 bg-black text-white rounded hover:bg-black transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Preview -->
    <script>
        document.getElementById('gambarInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewGambar');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
