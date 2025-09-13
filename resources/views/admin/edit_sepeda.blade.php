<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Sepeda - GowesYuk</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{ asset('js/admin/edit_sepeda.js') }}"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    @include('admin.layout.navbar')

    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Sepeda</h1>

            <form action="{{ route('admin.update_sepeda', $sepeda->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Jenis Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Jenis Sepeda</label>
                    <select name="jenis_sepeda" required
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Gunung" {{ $sepeda->jenis_sepeda == 'Gunung' ? 'selected' : '' }}>Gunung</option>
                        <option value="Balap" {{ $sepeda->jenis_sepeda == 'Balap' ? 'selected' : '' }}>Balap</option>
                        <option value="Lipat" {{ $sepeda->jenis_sepeda == 'Lipat' ? 'selected' : '' }}>Lipat</option>
                        <option value="Hybrid" {{ $sepeda->jenis_sepeda == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                        <option value="Listrik" {{ $sepeda->jenis_sepeda == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                        <option value="BMX" {{ $sepeda->jenis_sepeda == 'BMX' ? 'selected' : '' }}>BMX</option>
                        <option value="Cruiser" {{ $sepeda->jenis_sepeda == 'Cruiser' ? 'selected' : '' }}>Cruiser</option>
                        <option value="Fixie" {{ $sepeda->jenis_sepeda == 'Fixie' ? 'selected' : '' }}>Fixie</option>
                        <option value="Anak" {{ $sepeda->jenis_sepeda == 'Anak' ? 'selected' : '' }}>Anak</option>
                        <option value="Tandem" {{ $sepeda->jenis_sepeda == 'Tandem' ? 'selected' : '' }}>Tandem</option>
                    </select>
                    @error('jenis_sepeda')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Sepeda</label>
                    <input type="text" name="nama_sepeda" value="{{ old('nama_sepeda', $sepeda->nama_sepeda) }}" required
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('nama_sepeda')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status/Kondisi -->
                <div>
                    <label for="kondisi" class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="kondisi" id="kondisi" class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="tersedia" {{ $sepeda->kondisi == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="disewa" {{ $sepeda->kondisi == 'disewa' ? 'selected' : '' }}>Disewa</option>
                        <option value="perawatan" {{ $sepeda->kondisi == 'perawatan' ? 'selected' : '' }}>Perawatan</option>
                        <option value="rusak" {{ $sepeda->kondisi == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                    @error('kondisi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kode Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Kode Sepeda</label>
                    <input type="text" name="kode_sepeda" value="{{ old('kode_sepeda', $sepeda->kode_sepeda) }}" required
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('kode_sepeda')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga Hari & Harga Jam -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Harga per Hari</label>
                        <input type="number" name="harga_hari" value="{{ old('harga_hari', $sepeda->harga_hari) }}" required
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('harga_hari')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Harga per Jam</label>
                        <input type="number" name="harga_jam" value="{{ old('harga_jam', $sepeda->harga_jam) }}" required
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('harga_jam')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Deskripsi Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Deskripsi Sepeda</label>
                    <textarea name="deskripsi_sepeda" rows="4"
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Deskripsi singkat tentang sepeda...">{{ old('deskripsi_sepeda', $sepeda->deskripsi_sepeda) }}</textarea>
                    @error('deskripsi_sepeda')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Gambar Sepeda</label>
                    <input type="file" name="gambar_sepeda" id="gambarInput" accept="image/*"
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('gambar_sepeda')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-3 text-center">
                        <img id="previewGambar" class="w-48 rounded shadow" 
                             src="{{ $sepeda->gambar_sepeda ? asset('storage/sepeda/'.$sepeda->gambar_sepeda) : asset('images/no-image.png') }}" 
                             alt="Preview Gambar">
                    </div>
                </div>

                <!-- Tag Sepeda -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Tag Sepeda</label>
                    <input type="text" name="tag_sepeda" value="{{ old('tag_sepeda', $sepeda->tag_sepeda) }}"
                        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('tag_sepeda')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Perawatan Terakhir & Stok -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Perawatan Terakhir</label>
                        <input type="date" name="perawatan_terakhir" value="{{ old('perawatan_terakhir', $sepeda->perawatan_terakhir) }}"
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('perawatan_terakhir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', $sepeda->stok) }}"
                            class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('stok')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
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

</body>
</html>
