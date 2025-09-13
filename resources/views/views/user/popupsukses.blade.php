<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Popup Pesanan Dikonfirmasi</title>
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user/popup_suksescss.css') }}">
</head>
<body>
  <div class="overlay" role="dialog" aria-modal="true" aria-labelledby="popupTitle" aria-describedby="popupDesc">
    <div class="popup">
      <div class="checkmark-circle" aria-hidden="true">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M9 16.17l-3.88-3.88a1 1 0 1 0-1.41 1.41l4.59 4.59a1 1 0 0 0 1.41 0l10-10a1 1 0 1 0-1.41-1.41L9 16.17z"/>
        </svg>
      </div>
      <h2 id="popupTitle">Pesanan Dikonfirmasi</h2>
      <p id="popupDesc">
        Terima kasih! Pesanan Anda telah dikonfirmasi.
        <br />
        Segera Ambil Pesanan Anda ke Toko Kami.
      </p>
      <button class="btn-primary" id="continueBtn" type="button">Lanjutkan Penyewaan</button>
      <div class="order-id" aria-label="ID Pesanan">ID Pesanan: {{ $order_id ?? '12345' }}</div>
    </div>
  </div>

<script>
  document.getElementById('continueBtn').addEventListener('click', () => {
    document.querySelector('.overlay').style.display = 'none';
  });
</script>
</body>
</html>

