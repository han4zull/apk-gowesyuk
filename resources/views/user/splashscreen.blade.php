<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gowesyuk - Splash Screen</title>
    <style>
        
    </style>
    <link rel="stylesheet" href="{{ asset('css/user/splashscreen.css') }}">
</head>
<body>
    <div class="splash-container">
        <div class="logo-container">
            <img src="images/gowesyuk1.png" alt="" class="logo">
        </div>
        <h1 class="app-name">Gowesyuk</h1>
        <p class="slogan">Solusi sepeda anda</p>
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const splash = document.querySelector('.splash-container');
        if (splash) {
            splash.innerHTML = `
                <div style="animation: fadeIn 1s ease-out;">
                    <h2 style="color: #000000; margin-bottom: 1rem;">Selamat Datang di Gowesyuk</h2>
                    <p style="color: #7f8c8d;">Aplikasi sedang dimuat...</p>
                </div>
            `;
        }
    }, 3000);

    setTimeout(function() {
        // Blade syntax bisa dipakai di sini karena ini di Blade
        window.location.href = "{{ route('user.landing_page') }}";
    }, 4000);
});
</script>


</body>
</html>

