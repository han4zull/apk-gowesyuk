const logoutModal = document.getElementById('logoutModal');
        const successModal = document.getElementById('successModal');
        const confirmLogout = document.getElementById('confirmLogout');
        const cancelLogout = document.getElementById('cancelLogout');

        confirmLogout.addEventListener('click', function() {
            logoutModal.style.display = 'none';
            successModal.style.display = 'flex';
            setTimeout(function() {
                window.location.href = "{{ url('landing_page') }}";
            }, 1500);
        });

        cancelLogout.addEventListener('click', function() {
            window.history.back();
        });