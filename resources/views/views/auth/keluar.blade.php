<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Popup Konfirmasi Logout -->
    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center max-w-sm w-full">
            <h2 class="text-xl font-bold mb-4">Yakin ingin keluar?</h2>
            <div class="flex justify-center gap-6 mt-6">
                <button id="confirmLogout" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 font-semibold">Iya</button>
                <button id="cancelLogout" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 font-semibold">Tidak</button>
            </div>
        </div>
    </div>

    <!-- Popup Berhasil Keluar -->
    <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center max-w-sm w-full">
            <h2 class="text-xl font-bold mb-4 text-green-600">Anda berhasil keluar</h2>
        </div>
    </div>

    <script>
        const logoutModal = document.getElementById('logoutModal');
        const successModal = document.getElementById('successModal');
        const confirmLogout = document.getElementById('confirmLogout');
        const cancelLogout = document.getElementById('cancelLogout');

        confirmLogout.addEventListener('click', function() {
            logoutModal.style.display = 'none';
            successModal.style.display = 'flex';
            setTimeout(function() {
                window.location.href = "{{ url('landing_page') }}";
            }, 1500);
        });

        cancelLogout.addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>
</html>
