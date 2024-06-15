<script>
    // Dapatkan referensi ke input password dan tombol
    var passwordInput = document.querySelector('input[name="password"]');
    var togglePasswordButton = document.getElementById('toggle-password');

    // Fungsi untuk menyimpan preferensi tampilan password ke session
    function savePasswordVisibilityPreference(visible) {
        sessionStorage.setItem('passwordVisible', visible ? 'true' : 'false');
    }

    // Event listener untuk tombol
    togglePasswordButton.addEventListener('click', function() {
        // Ubah tipe input password menjadi text atau sebaliknya
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';

        // Ubah ikon mata sesuai dengan tipe input
        togglePasswordButton.innerHTML = passwordInput.type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';

        // Simpan preferensi tampilan password ke session
        savePasswordVisibilityPreference(passwordInput.type === 'text');
    });

    // Ketika halaman dimuat, periksa session untuk menetapkan tampilan password
    window.addEventListener('load', function() {
        var passwordVisible = sessionStorage.getItem('passwordVisible');

        // Jika session ada dan bernilai 'true', ubah tampilan password menjadi teks
        if (passwordVisible === 'true') {
            passwordInput.type = 'text';
            togglePasswordButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }
    });
</script>