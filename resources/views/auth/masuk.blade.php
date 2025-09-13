<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login — GowesYuk</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('css/auth/masuk.css') }}" />
  <script src="{{ asset('js/auth/masuk.js') }}"></script>

</head>

<body>
  <div class="auth-container">
    <div class="auth-visual">
      <img src="{{ asset('images/gowesyuk1.png') }}" alt="GowesYuk Logo" />
      <div class="visual-text">Mau sehat dan hemat?<br>GowesYuk aja!</div>
    </div>

    <form action="{{ route('auth.login.post') }}" method="POST" class="auth-form">
      @csrf
      <h2>Masuk</h2>

      @if ($errors->any())
    <div class="alert alert-danger mb-3">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
      @endif


      <label for="email">Email</label>
      <div class="input-container">
        <input type="email" id="email" name="email" required placeholder="Masukkan email Anda" autocomplete="off" />
        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
      </div>

      <label for="password">Password</label>
      <div class="input-container">
        <input type="password" id="password" name="password" required placeholder="Masukkan password" autocomplete="new-password" />
        <span class="input-group-text clickable">
          <i class="bi bi-eye toggle-password"></i>
        </span>
      </div>

      <div class="role-toggle">
        <label class="role-btn active">
          <input type="radio" name="role" value="user" checked hidden>
          <i class="bi bi-person-fill"></i> User
        </label>
        <label class="role-btn">
          <input type="radio" name="role" value="admin" hidden>
          <i class="bi bi-shield-lock-fill"></i> Admin
        </label>
      </div>

      <button type="submit" class="btn-login">Masuk</button>

      <p class="auth-switch" id="register-link">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang!</a></p>
    </form>
  </div>

</body>
</html>
