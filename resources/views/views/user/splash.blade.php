<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gowesyuk - Splash Screen</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e0e1f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .splash-container {
            text-align: center;
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            animation: fadeIn 1s ease-out;
        }

        .logo-container {
    margin-bottom: 0.5rem; /* sebelumnya 2rem, biar teks lebih dekat */
    animation: bounce 1.5s infinite alternate;
}

.logo {
    width: 220px;   /* gedein ukuran logo */
    height: 220px;  /* sesuaikan biar proporsional */
    object-fit: contain;
}

.app-name {
    color: #000000;
    font-size: 2.8rem; /* sedikit lebih besar biar matching dengan logo */
    font-weight: bold;
    margin-bottom: 0.5rem;
    text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.1);
}


        .slogan {
            color: #7f8c8d;
            font-size: 1.1rem;
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.5s forwards;
        }

        .progress-container {
            width: 80%;
            height: 4px;
            background: #ecf0f1;
            border-radius: 2px;
            margin: 2rem auto 0;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0;
            background: #000000;
            animation: progressBar 2.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-15px); }
        }

        @keyframes progressBar {
            0% { width: 0; }
            100% { width: 100%; }
        }

        @media (max-width: 480px) {
            .logo {
                width: 150px;
                height: 150px;
            }
            .app-name {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="splash-container">
        <div class="logo-container">
            <img src="images/gowesyuk1.png" alt="" class="logo">
        </div>
        <h1 class="app-name">Gowesyuk</h1>
        <p class="slogan">Solusi logistik terpercaya</p>
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                // Redirect to main app page after 3 seconds
                // In actual app, this would redirect to your main activity/page
                console.log('Redirecting to main app...');
                // window.location.href = "main.html";
                
                // For demo purposes, we'll just show a message
                const splash = document.querySelector('.splash-container');
                splash.innerHTML = `
                    <div style="animation: fadeIn 1s ease-out;">
                        <h2 style="color: #000000; margin-bottom: 1rem;">Selamat Datang di Gowesyuk</h2>
                        <p style="color: #7f8c8d;">Aplikasi sedang dimuat...</p>
                    </div>
                `;
            }, 3000);
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            window.location.href = "{{ route('user.landing_page') }}";
        }, 4000);
    });
</script>
</body>
</html>

