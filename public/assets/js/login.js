// Untuk toggle password
function togglePassword() {
    const passwordInput = document.getElementById('passwordInput');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    const eyeIcon = document.getElementById('eyeIcon');
    eyeIcon.classList.toggle('bi-eye');
    eyeIcon.classList.toggle('bi-eye-slash-fill');
}

// Panggil fungsi togglePassword saat tombol di klik
document.getElementById('togglePassword').onclick = togglePassword;
