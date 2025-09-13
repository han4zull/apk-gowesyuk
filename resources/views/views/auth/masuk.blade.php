<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
  <script src="{{ asset('js/app.js') }}"></script>

  <style>
    /* Tambahan styling untuk role select */
    .role-container {
      margin-bottom: 15px;
    }
    .role-container select {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .role-toggle {
  display: flex;
  gap: 15px;
  margin-bottom: 20px;
}
.role-btn {
  flex: 1;
  background-color: #f8f9fa;
  border: 2px solid #ddd;
  border-radius: 12px;
  text-align: center;
  padding: 12px 0;
  cursor: pointer;
  transition: all 0.3s;
  font-weight: bold;
  user-select: none;
  color: #555;
}

/* Saat label aktif */
.role-btn.active {
  background-color: #a47aff;
  color: white;
  border-color: #a47aff;
}

/* Hover tetap ada */
.role-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

  </style>

</head>
<body>
  <div class="auth-container">
    <div class="auth-visual">
      <img src="{{ asset('images/gowesyuk1.png') }}" alt="gowesyuk" class="visual-image" />
      <div class="visual-text">
        <p>Mau sehat dan hemat?<br>GowesYuk aja!</p>
      </div>
    </div>

    <!-- Form Login -->
    <form action="{{ route('masuk.post') }}" method="POST" class="auth-form">
      @csrf
      <h2>Masuk</h2>

      <label for="email">Email:</label>
      <div class="input-container">
        <span class="input-group-text">
          <i class="bi bi-envelope icon"></i>
        </span>
        <input type="email" id="email" name="email" class="form-control" required />
      </div>

      <label for="password">Password:</label>
      <div class="input-container">
        <span class="input-group-text clickable">
           <i class="bi bi-eye icon toggle-password" style="cursor:pointer;"></i>
        </span>
        <input type="password" id="password" name="password" class="form-control" required />
      </div>

      <!-- Pilihan Role -->
       <div class="role-toggle">
        <label class="role-btn active">
          <input type="radio" name="role" value="user" checked hidden>
          <span><i class="bi bi-person-fill"></i> User</span>
        </label>
        <label class="role-btn">
          <input type="radio" name="role" value="admin" hidden>
          <span><i class="bi bi-shield-lock-fill"></i> Admin</span>
       </label>
      </div>

      <button type="submit" class="btn-login">Masuk</button>

      <p class="auth-switch">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang!</a>
      </p>
    </form>
  </div>

  <script>
    // Toggle password visibility
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      togglePassword.classList.toggle('bi-eye');
      togglePassword.classList.toggle('bi-eye-slash');
    });

    const roleBtns = document.querySelectorAll('.role-btn');
      roleBtns.forEach(btn => {
      btn.addEventListener('click', () => {
      roleBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      btn.querySelector('input').checked = true;
    });
  });
  </script>

</body>
</html>
