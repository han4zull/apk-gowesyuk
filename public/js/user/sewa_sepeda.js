document.addEventListener('DOMContentLoaded', () => {
  const btnTerapkan = document.getElementById('btn-terapkan');
  const btnReset = document.getElementById('btn-reset');
  const sepedaCards = document.querySelectorAll('.sepeda-card');

  btnTerapkan.addEventListener('click', () => {
    const jenis = document.getElementById('jenis_sepeda').value.toLowerCase();
    const harga = document.getElementById('harga_jam').value;

    sepedaCards.forEach(card => {
      const cardJenis = card.getAttribute('data-jenis').toLowerCase();
      const cardHarga = parseInt(card.getAttribute('data-harga'));

      const jenisMatch = (jenis === 'semua') || (cardJenis === jenis);

      let hargaMatch = false;
      if(harga === 'semua') {
        hargaMatch = true;
      } else {
        const [min, max] = harga.split('-').map(Number);
        hargaMatch = cardHarga >= min && cardHarga <= max;
      }

      card.style.display = (jenisMatch && hargaMatch) ? 'flex' : 'none';
    });
  });

  btnReset.addEventListener('click', () => {
    document.getElementById('jenis-sepeda').value = 'semua';
    document.getElementById('harga-sepeda').value = 'semua';
    sepedaCards.forEach(card => card.style.display = 'flex');
  });
});
