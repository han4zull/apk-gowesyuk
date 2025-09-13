<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GowesYuk - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/beranda_admin.css') }}">
</head>
<body class="bg-[#E8E7F7]">

@include('admin.layout.navbar')  

<main class="p-8 max-w-6xl mx-auto">
    <h1 class="text-2xl font-bold mb-1">Beranda</h1>
    <p class="subtitle mb-6 text-gray-600">Selamat datang kembali! Berikut ringkasan aktivitas rental sepeda hari ini.</p>

    <!-- Statistik -->
    <div class="stats grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="card relative">
            <p>Total Sepeda</p>
            <h2>{{ $totalSepeda }}</h2>
            <span class="icon"><i class="fa-solid fa-bicycle"></i></span>
            <span class="text-green-600 text-sm">+12% dari kemarin</span>
        </div>
        <div class="card relative">
            <p>Sepeda Disewa</p>
            <h2>{{ $sepedaDisewa }}</h2>
            <span class="icon"><i class="fa-solid fa-arrow-trend-up"></i></span>
            <span class="text-green-600 text-sm">+23% dari kemarin</span>
        </div>
        <div class="card relative">
            <p>Pengguna Aktif</p>
            <h2>{{ $penggunaAktif }}</h2>
            <span class="icon"><i class="fa-solid fa-user-group"></i></span>
            <span class="text-green-600 text-sm">+5% dari kemarin</span>
        </div>
        <div class="card relative">
            <p>Pendapatan</p>
            <h2>Rp {{ number_format($pendapatan, 0, ',', '.') }}</h2>
            <span class="icon"><i class="fa-solid fa-dollar-sign"></i></span>
            <span class="text-green-600 text-sm">+8% dari kemarin</span>
        </div>
    </div>

    <!-- Hitung persentase status sepeda -->
    @php
        $totalSepedaAll = $totalSepeda > 0 ? $totalSepeda : 1;
        $persenTersedia = ($tersedia / $totalSepedaAll) * 100;
        $persenDisewa = ($sepedaDisewa / $totalSepedaAll) * 100;
        $persenMaintenance = ($maintenance / $totalSepedaAll) * 100;
        $persenRusak = ($rusak / $totalSepedaAll) * 100;
    @endphp

    <!-- Grid Layout -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <!-- Penyewaan Terbaru -->
        <div class="rent col-span-2">
            <div class="flex justify-between items-center mb-3">
                <h3>Penyewaan Terbaru</h3>
                <span class="text-gray-500 text-sm"><i class="fa-regular fa-calendar"></i> Hari ini</span>
            </div>
            @foreach($latestRent as $rent)
            <div class="rent-item flex justify-between items-center">
                <div class="rent-info">
                    <strong>{{ $rent->customer->name ?? '-' }}</strong>
                    <p>{{ $rent->sepeda->nama_sepeda ?? $rent->nama_sepeda }}</p>
                         <div class="flex items-center text-sm text-gray-600 space-x-6">
    <span class="flex items-center">
        <i class="fa fa-envelope mr-2 text-black-500"></i>
        {{ $rent->customer->email ?? '-' }}
    </span>
    <span class="flex items-center">
        <i class="fa fa-phone mr-2 text-black-500"></i>
        {{ $rent->customer->phone ?? '-' }}
    </span>
</div>


                </div>
                <span class="px-2 py-1 rounded-full text-sm font-medium
    {{ $rent->status === 'proses' ? 'bg-black text-white' :
       ($rent->status === 'selesai' ? 'bg-green-600 text-white' : 'bg-red-600 text-white') }}">
    {{ ucfirst($rent->status ?? '-') }}
</span>

            </div>
            @endforeach
        </div>

        <!-- Status Sepeda -->
        <div class="bike-status">
            <h3>Status Sepeda</h3>

            <div class="bar">
                <div class="bar-label"><span>Tersedia</span><span>{{ $tersedia }}</span></div>
                <div class="progress">
                    <div style="width: {{ $persenTersedia }}%"></div>
                </div>
            </div>

            <div class="bar">
                <div class="bar-label"><span>Disewa</span><span>{{ $sepedaDisewa }}</span></div>
                <div class="progress">
                    <div style="width: {{ $persenDisewa }}%"></div>
                </div>
            </div>

            <div class="bar">
                <div class="bar-label"><span>Maintenance</span><span>{{ $maintenance }}</span></div>
                <div class="progress">
                    <div style="width: {{ $persenMaintenance }}%"></div>
                </div>
            </div>

            <div class="bar">
                <div class="bar-label"><span>Rusak</span><span>{{ $rusak }}</span></div>
                <div class="progress">
                    <div style="width: {{ $persenRusak }}%"></div>
                </div>
            </div>

            <p class="total">Total : {{ $totalSepeda }} sepeda</p>
        </div>
    </div>
</main>

</body>
</html>
