<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
  <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
<div class="auth-container">
    <div class="auth-visual">
      <img src="images/gowesyuk1.png" alt="gowesyuk" class="visual-image" />
      <div class="visual-text">
        <p>Mau sehat dan hemat?<br> 
          GowesYuk aja!</p>
      </div>
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

      <label for="name">Username:</label>
      <div class="input-container">
        <span class="input-group-text">
          <i class="bi bi-person icon"></i>
        </span>
        <input type="text" id="name" name="name" class="form-control" required />
      </div>

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

      <label for="password_confirm">Konfirmasi Password:</label>
      <div class="input-container">
        <span class="input-group-text clickable">
          <i class="bi bi-lock icon toggle-lock" style="cursor:pointer;"></i>
        </span>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required />
      </div>

      <button type="submit" class="btn-login">Daftar</button>

      <p class="auth-switch">
        Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
      </p>
    </form>
  </div>

</body>
</html>
