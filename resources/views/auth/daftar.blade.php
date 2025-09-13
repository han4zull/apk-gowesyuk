<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar — GowesYuk</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('css/auth/daftar.css') }}" />
  <script src="{{ asset('js/auth/daftar.js') }}"></script>

</head>

<body>
  <div class="auth-container">
    <div class="auth-visual">
      <img src="{{ asset('images/gowesyuk1.png') }}" alt="GowesYuk Logo" />
      <div class="visual-text">Mau sehat dan hemat?<br>GowesYuk aja!</div>
    </div>

    <form action="{{ route('daftar.post') }}" method="POST" class="auth-form">
      @csrf
      <h2>Daftar</h2>

      {{-- Tampilkan error validasi --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <label for="name">Username</label>
<div class="input-container">
  <input type="text" id="name" name="name" required placeholder="Masukkan username Anda" autocomplete="off" />
  <span class="input-group-text"><i class="bi bi-person"></i></span>
</div>

<label for="email">Email</label>
<div class="input-container">
  <input type="email" id="email" name="email" required placeholder="Masukkan email Anda" autocomplete="off" />
  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
</div>

<label for="phone">Nomor Telepon</label>
<div class="input-container">
  <input type="tel" id="phone" name="phone" required placeholder="Masukkan nomor telepon Anda" autocomplete="off" />
  <span class="input-group-text"><i class="bi bi-telephone"></i></span>
</div>

<label for="password">Password</label>
<div class="input-container">
  <input type="password" id="password" name="password" required placeholder="Masukkan password" autocomplete="new-password" />
  <span class="input-group-text clickable"><i class="bi bi-eye"></i></span>
</div>

<label for="password_confirmation">Konfirmasi Password</label>
<div class="input-container">
  <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi password" autocomplete="new-password" />
  <span class="input-group-text clickable"><i class="bi bi-lock"></i></span>
</div>

      <button type="submit" class="btn-login">Daftar</button>

      <p class="auth-switch">Sudah punya akun? <a href="{{ route('auth.login') }}">Masuk</a></p>
    </form>
  </div>

</body>
</html>
