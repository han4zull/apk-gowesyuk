document.addEventListener('DOMContentLoaded', () => {

  // ===== Toggle password visibility =====
  const togglePasswords = document.querySelectorAll('.toggle-password');
  togglePasswords.forEach(toggle => {
    toggle.addEventListener('click', () => {
      const input = toggle.closest('.input-container').querySelector('input');
      if (input.type === 'password') {
        input.type = 'text';
        toggle.classList.remove('bi-eye');
        toggle.classList.add('bi-eye-slash');
      } else {
        input.type = 'password';
        toggle.classList.remove('bi-eye-slash');
        toggle.classList.add('bi-eye');
      }
    });
  });

  // ===== Role toggle =====
  const roleBtns = document.querySelectorAll('.role-btn');
  const registerLink = document.getElementById('register-link');

  function updateRegisterLink() {
    const selectedRole = document.querySelector('.role-btn.active input').value;
    registerLink.style.display = (selectedRole === 'admin') ? 'none' : 'block';
  }

  roleBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      roleBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      btn.querySelector('input').checked = true;
      updateRegisterLink();
    });
  });

  // Cek saat load
  updateRegisterLink();

  // ===== Ripple effect =====
  const btnLogin = document.querySelector('.btn-login');
  if (btnLogin) {
    btnLogin.addEventListener('click', e => {
      const circle = document.createElement('span');
      const rect = btnLogin.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      circle.style.width = circle.style.height = size + 'px';
      circle.style.background = 'rgba(255,255,255,0.2)';
      circle.style.position = 'absolute';
      circle.style.borderRadius = '50%';
      circle.style.pointerEvents = 'none';
      circle.style.left = e.clientX - rect.left - size / 2 + 'px';
      circle.style.top = e.clientY - rect.top - size / 2 + 'px';
      circle.style.animation = 'ripple 0.6s linear';
      btnLogin.appendChild(circle);
      setTimeout(() => circle.remove(), 600);
    });
  }

});
