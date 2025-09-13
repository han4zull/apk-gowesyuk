const deleteButtons = document.querySelectorAll('.delete-fav-btn');
  const favConfirm = document.getElementById('favConfirm');
  const cancelDelete = document.getElementById('cancelDelete');
  const confirmDelete = document.getElementById('confirmDelete');
  let formToDelete = null;

  deleteButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      formToDelete = btn.closest('form');
      favConfirm.classList.remove('hidden');
    });
  });

  cancelDelete.addEventListener('click', () => {
    favConfirm.classList.add('hidden');
    formToDelete = null;
  });

  confirmDelete.addEventListener('click', () => {
    if (formToDelete) formToDelete.submit();
  });