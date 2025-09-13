// ==========================
// Profile JS FINAL COMBINED
// ==========================

document.addEventListener("DOMContentLoaded", () => {
    // --- 1. RATING BINTANG ---
    const stars = document.querySelectorAll('input[name="rating"] + label');
    if (stars.length > 0) {
        stars.forEach((label, index) => {
            label.addEventListener('click', () => {
                stars.forEach((l, i) => {
                    l.classList.toggle('text-yellow-400', i <= index);
                    l.classList.toggle('text-gray-300', i > index);
                });
            });
        });
    }

    // --- 2. PREVIEW AVATAR ---
    window.previewAvatar = function(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('avatar-preview');
            if (output) output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    // --- 3. FORM EDIT PROFILE ---
    const editProfileForm = document.getElementById('edit-profile-form');
    const sidebarUsername = document.getElementById('sidebar-username');

    if (editProfileForm && sidebarUsername) {
        editProfileForm.addEventListener('submit', function() {
            const username = document.getElementById('name').value;
            if (username) sidebarUsername.textContent = username;
        });
    }

    // --- 4. LOGOUT MODAL ---
    const logoutLink = document.getElementById('logout-link');
    const logoutModal = document.getElementById('logoutModal');
    const logoutBox = document.getElementById('logoutBox');
    const confirmLogout = document.getElementById('confirmLogout');
    const cancelLogout = document.getElementById('cancelLogout');
    const logoutForm = document.getElementById('logout-form');

    if (logoutLink && logoutModal && logoutBox && confirmLogout && cancelLogout && logoutForm) {
        logoutLink.addEventListener('click', (e) => {
            e.preventDefault();
            logoutModal.classList.remove('hidden');
            setTimeout(() => {
                logoutBox.classList.remove('opacity-0', 'scale-95');
                logoutBox.classList.add('opacity-100', 'scale-100');
            }, 10);
        });

        cancelLogout.addEventListener('click', () => {
            logoutBox.classList.add('opacity-0', 'scale-95');
            logoutBox.classList.remove('opacity-100', 'scale-100');
            setTimeout(() => logoutModal.classList.add('hidden'), 200);
        });

        confirmLogout.addEventListener('click', () => {
            logoutBox.classList.add('opacity-0', 'scale-95');
            logoutBox.classList.remove('opacity-100', 'scale-100');
            setTimeout(() => {
                logoutModal.classList.add('hidden');
                logoutForm.submit();
            }, 200);
        });
    }

    // --- 5. SIDEBAR NAVIGATION ---
    const profileLink = document.getElementById('profile-link');
    const myOrdersLink = document.getElementById('my-orders-link');
    const settingsLink = document.getElementById('settings-link');

    const profileContent = document.getElementById('profile-content');
    const myOrdersContent = document.getElementById('my-orders-content');
    const settingsContent = document.getElementById('settings-content');

    function setActiveLink(activeLink) {
        [profileLink, myOrdersLink, settingsLink].forEach(link => {
            if (!link) return;
            link.classList.toggle('bg-indigo-100', link === activeLink);
            link.classList.toggle('text-indigo-900', link === activeLink);
            link.classList.toggle('font-semibold', link === activeLink);
        });
    }

    function showSection(sectionToShow, activeLink) {
        [profileContent, myOrdersContent, settingsContent].forEach(content => {
            if (!content) return;
            content.classList.toggle('hidden', content !== sectionToShow);
        });
        setActiveLink(activeLink);
    }

    if (profileLink && profileContent) {
        profileLink.addEventListener('click', e => { e.preventDefault(); showSection(profileContent, profileLink); });
    }
    if (myOrdersLink && myOrdersContent) {
        myOrdersLink.addEventListener('click', e => { e.preventDefault(); showSection(myOrdersContent, myOrdersLink); });
    }
    if (settingsLink && settingsContent) {
        settingsLink.addEventListener('click', e => { e.preventDefault(); showSection(settingsContent, settingsLink); });
    }

    // Default tampilkan Profile saat load
    if (profileContent && profileLink) {
        showSection(profileContent, profileLink);
    }

    // --- 6. MOBILE MENU TOGGLE ---
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // --- 7. REFRESH ORDERS ---
    window.refreshOrders = function() {
        fetch("{{ route('user.penyewaan') }}")
            .then(response => response.json())
            .then(data => {
                const ordersDiv = document.getElementById('my-orders-content');
                if (!ordersDiv) return;

                ordersDiv.innerHTML = '';
                if (data.length === 0) {
                    ordersDiv.innerHTML = `
                    <div class="flex flex-col items-center justify-center py-16 bg-gray-100 rounded-lg shadow-md">
                        <i class="bx bx-bicycle text-6xl text-gray-400 mb-4"></i>
                        <p class="text-gray-500 text-lg font-medium">Belum ada pesanan.</p>
                        <p class="text-gray-400 text-sm">Ayo mulai sewa sepeda pertama Anda!</p>
                    </div>`;
                    return;
                }

                data.forEach(order => {
                    let durasi = order.durasi_jam > 0 
                        ? `<p class="text-gray-600">Durasi: ${order.durasi_jam} Jam</p>` 
                        : `<p class="text-gray-600">Durasi: ${order.durasi_hari} Hari</p>`;
                    
                    let harga = order.durasi_jam > 0 ? order.harga_jam : order.harga_hari;

                    let statusLabel = '';
                    if(order.status === 'proses') statusLabel = `
                        <div class="flex space-x-2">
                            <button class="px-4 py-2 bg-green-500 text-white rounded-md">Selesai</button>
                            <button class="px-4 py-2 bg-red-600 text-white rounded-md">Batalkan</button>
                        </div>`;
                    else if(order.status === 'selesai') statusLabel = `<span class="mt-2 text-green-600 font-semibold">Selesai</span>`;
                    else if(order.status === 'dibatalkan') statusLabel = `<span class="mt-2 text-red-600 font-semibold">Dibatalkan</span>`;

                    ordersDiv.innerHTML += `
                    <div class="bg-white rounded-lg p-4 shadow-md flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-4 mb-4">
                        <img src="/storage/sepeda/${order.gambar_sepeda}" alt="${order.nama_sepeda}" class="w-32 h-24 object-cover rounded-md flex-shrink-0">
                        <div class="flex-1 text-center md:text-left">
                            <p class="font-semibold text-lg text-gray-800">${order.nama_sepeda}</p>
                            <p class="text-indigo-600 font-bold">Rp ${Number(harga).toLocaleString()}</p>
                            ${durasi}
                        </div>
                        <div class="flex flex-col items-center md:items-end md:ml-auto">
                            <p class="text-xl font-bold text-gray-800 mb-2">Rp ${Number(order.total).toLocaleString()}</p>
                            ${statusLabel}
                        </div>
                    </div>`;
                });
            });
    }

    // Auto refresh tiap 5 detik (kalau ada #my-orders-content)
    if (document.getElementById('my-orders-content')) {
        setInterval(refreshOrders, 5000);
    }
});

// --- 8. MODAL BATAL / SELESAI (GLOBAL) ---
function openCancelModal(orderId) {
    const modal = document.getElementById('cancelModal');
    const form = document.getElementById('cancelForm');
    if (modal && form) {
        form.action = '/penyewaan/batal/' + orderId;
        modal.classList.remove('hidden');
    }
}
function closeCancelModal() {
    const modal = document.getElementById('cancelModal');
    if (modal) modal.classList.add('hidden');
}
function openCompleteModal(orderId) {
    const modal = document.getElementById('completeModal');
    const form = document.getElementById('completeForm');
    if (modal && form) {
        form.action = '/penyewaan/selesai/' + orderId;
        modal.classList.remove('hidden');
    }
}
function closeCompleteModal() {
    const modal = document.getElementById('completeModal');
    if (modal) modal.classList.add('hidden');
}
