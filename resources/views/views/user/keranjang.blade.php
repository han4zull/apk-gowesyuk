<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Keranjang Saya - GowesYuk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="antialiased font-sans text-gray-900 min-h-screen flex flex-col" style="background: radial-gradient(circle at 50% 0%, #e2e1fc 0%, #ffffffff 100%);">
  @include('user.layout.navbar')

  <main class="max-w-7xl mx-auto px-6 py-8 w-full">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl md:text-3xl font-bold">Keranjang Saya</h1>
      <a href="{{ url('sewa_sepeda') }}" class="text-sm md:text-base text-blue-700 hover:underline">Cari Sepeda Lain</a>
    </div>

    @php
      $favorites = $favorites ?? collect();
    @endphp

    @if($keranjang->isEmpty())
  <div class="bg-white border rounded-lg p-6 text-center shadow">
    <div class="text-4xl mb-2">🛒</div>
    <p class="text-gray-700 font-medium">Keranjang kamu masih kosong.</p>
    <p class="text-gray-500 text-sm mt-1">Tambahkan sepeda ke keranjang dari halaman detail produk.</p>
    <a href="{{ url('sewa_sepeda') }}" class="inline-block mt-4 px-4 py-2 bg-black text-white rounded-md text-sm hover:bg-gray-800">Jelajahi Sepeda</a>
  </div>
@else
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($keranjang as $item)
      @php $sepeda = $item->sepeda; @endphp
      <div class="bg-white rounded-xl shadow border overflow-hidden flex flex-col relative">
        <form method="POST" action="{{ route('user.keranjang.destroy', $item->id) }}" class="absolute top-2 right-2 delete-fav-form">
          @csrf
          @method('DELETE')
          <button type="button" data-keranjang-id="{{ $item->id }}" title="Hapus dari keranjang" class="delete-fav-btn p-2 rounded-full bg-white/90 border border-gray-300 hover:bg-red-50 hover:border-red-400 text-gray-600 hover:text-red-600 shadow-sm">✕</button>
        </form>
        <div class="w-full h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
          <img src="{{ asset('storage/sepeda/' . ($sepeda->gambar_sepeda ?? '')) }}" alt="{{ $sepeda->nama_sepeda ?? $sepeda->merk_sepeda ?? 'Sepeda' }}" class="object-contain w-full h-full"/>
        </div>
        <div class="p-4 flex-1 flex flex-col">
          <h2 class="font-semibold text-lg line-clamp-2">{{ $sepeda->nama_sepeda ?? $sepeda->merk_sepeda ?? 'Sepeda' }}</h2>
          <p class="text-sm text-gray-600 mt-1">Jenis: {{ $sepeda->jenis_sepeda ?? '-' }}</p>

          <div class="mt-3">
            @php
              $harga = $sepeda->harga_per_jam ?? $sepeda->harga_sepeda ?? null;
            @endphp
            @if($harga)
              <p class="text-xl font-bold">Rp {{ number_format((int) preg_replace('/[^0-9]/', '', $harga), 0, ',', '.') }} <span class="text-sm font-normal text-gray-600">{{ isset($sepeda->harga_per_jam) ? '/ jam' : '' }}</span></p>
            @endif
          </div>

          <div class="mt-4 flex gap-2">
            <a href="{{ url('detail_produk/' . $sepeda->id) }}" class="flex-1 text-center px-3 py-2 bg-black text-white rounded-md text-sm hover:bg-gray-800">Lihat Detail</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif

  </main>

  <!--Footer-->
  @include('user.layout.footer')

  <!-- Single confirm modal for deleting favorite -->
<div id="favConfirm" class="fixed inset-0 z-50 hidden">
  <div class="absolute inset-0 bg-black/50"></div>
  <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-sm rounded-xl shadow-lg border p-6">
      <div class="text-2xl mb-2">🗑️</div>
      <h3 class="text-lg font-semibold">Hapus dari Keranjang?</h3>
      <p class="text-sm text-gray-600 mt-1">Item akan dihapus dari keranjangmu. Tindakan ini tidak dapat dibatalkan.</p>
      <div class="mt-5 flex gap-3 justify-end">
        <button id="cancelDelete" class="px-4 py-2 border rounded-md hover:bg-gray-50">Batal</button>
        <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>
