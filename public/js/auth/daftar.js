// Toggle password visibility
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');
    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      togglePassword.classList.toggle('bi-eye');
      togglePassword.classList.toggle('bi-eye-slash');
    });

    // Toggle lock visibility for confirm password
    const toggleLock = document.querySelector('.toggle-lock');
    const confirmInput = document.querySelector('#password_confirmation');
    toggleLock.addEventListener('click', () => {
      const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmInput.setAttribute('type', type);
      toggleLock.classList.toggle('bi-lock');
      toggleLock.classList.toggle('bi-unlock');
    });

    // Ripple effect for button
    const btnRegister = document.querySelector('.btn-login');
    btnRegister.addEventListener('click', e => {
      const circle = document.createElement('span');
      circle.style.width = circle.style.height = '120px';
      circle.style.background = 'rgba(255,255,255,0.2)';
      circle.style.position = 'absolute';
      circle.style.borderRadius = '50%';
      circle.style.pointerEvents = 'none';
      circle.style.left = e.offsetX - 60 + 'px';
      circle.style.top = e.offsetY - 60 + 'px';
      circle.style.animation = 'ripple 0.6s linear';
      btnRegister.appendChild(circle);
      setTimeout(() => circle.remove(), 600);
    });