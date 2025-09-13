document.addEventListener("DOMContentLoaded", () => {
    console.log("✅ Navbar JS jalan...");

    const profileButton       = document.getElementById("profileButton");
    const logoutModal         = document.getElementById("logoutModal");
    const logoutBox           = document.getElementById("logoutBox");
    const confirmLogout       = document.getElementById("confirmLogout");
    const cancelLogout        = document.getElementById("cancelLogout");
    const logoutForm          = document.getElementById("logout-form");

    if (!profileButton) {
        console.log("❌ profileButton nggak ketemu");
        return;
    }

    console.log("✅ profileButton ketemu...");

    // Klik avatar → tampilkan modal logout
    profileButton.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("🖱 Klik avatar!");

        logoutModal.classList.remove("hidden");

        setTimeout(() => {
            logoutBox.classList.remove("opacity-0", "scale-95");
            logoutBox.classList.add("opacity-100", "scale-100");
        }, 10);
    });

    // Klik batal → sembunyikan modal
    cancelLogout.addEventListener("click", () => {
        logoutBox.classList.add("opacity-0", "scale-95");
        logoutBox.classList.remove("opacity-100", "scale-100");

        setTimeout(() => {
            logoutModal.classList.add("hidden");
        }, 200);
    });

    // Klik keluar → tandai logout sukses & submit form
    confirmLogout.addEventListener("click", (e) => {
        e.preventDefault(); // hentikan submit default
        logoutBox.classList.add("opacity-0", "scale-95");
        logoutBox.classList.remove("opacity-100", "scale-100");

        setTimeout(() => {
            logoutModal.classList.add("hidden");

            // Tandai bahwa logout sukses di localStorage
            localStorage.setItem('showLogoutSuccess', 'true');

            // Submit form logout → redirect ke landing page
            logoutForm.submit();
        }, 200);
    });
});
