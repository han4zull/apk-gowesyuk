document.addEventListener('DOMContentLoaded', function() {
    // ===== Toggle password visibility =====
    const togglePasswordIcons = document.querySelectorAll('.toggle-password');
    togglePasswordIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const input = this.closest('.input-container').querySelector('input');
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.remove('bi-eye');
                this.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                this.classList.remove('bi-eye-slash');
                this.classList.add('bi-eye');
            }
        });
    });

    // ===== Role toggle =====
    const roleButtons = document.querySelectorAll('.role-btn');
    roleButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            roleButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            // otomatis cek radio input
            const input = this.querySelector('input[type="radio"]');
            if(input) input.checked = true;
        });
    });

    // ===== Optional: simple form submit animation =====
    const loginForm = document.querySelector('.auth-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const btn = loginForm.querySelector('.btn-login');
            btn.disabled = true;
            btn.style.opacity = '0.7';
        });
    }
});
