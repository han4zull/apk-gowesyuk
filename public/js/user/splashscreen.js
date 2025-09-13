document.addEventListener('DOMContentLoaded', function() {
    const landingUrl = document.body.dataset.landingUrl;

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
        window.location.href = landingUrl;
    }, 4000);
});
