// Untuk toggle password
function togglePassword() {
    const passwordInput = document.getElementById('passwordInput');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    const eyeIcons = document.querySelectorAll('#togglePassword i');
    eyeIcons.forEach(icon => {
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash-fill');
    });

}

// Panggil fungsi togglePassword saat tombol di klik
document.getElementById('togglePassword').onclick = togglePassword;
