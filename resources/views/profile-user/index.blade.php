@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="card profile-user">
        <div class="card-header">
            <h3>Profile</h3>
        </div>
        <div class="card-body my-4">
            <div class="row">
                <div class="col-md-12 profile-items">
                    <h4>{{ $user->nama_lengkap }}</h4>
                    <p><strong>NIK:</strong> {{ $user->nik }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $user->tanggal_lahir }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin }}</p>
                    <p><strong>Alamat Domisili:</strong> {{ $user->alamat_domisili }}</p>
                    <p><strong>Pekerjaan:</strong> {{ $user->pekerjaan }}</p>
                    <p><strong>Status Perkawinan:</strong> {{ $user->status_perkawinan }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('user-dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Form Ganti Password</h3>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('profile.change-password') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Password Saat Ini</label>
                    <div class="input-group">
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" id="toggle-current-password">
                                <i class="bi bi-eye-slash-fill" id="toggle-current-password-icon"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" id="toggle-new-password">
                                <i class="bi bi-eye-slash-fill" id="toggle-new-password-icon"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" id="toggle-confirm-password">
                                <i class="bi bi-eye-slash-fill" id="toggle-confirm-password-icon"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Ganti Password</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePasswordIcons = document.querySelectorAll('.toggle-password');

        togglePasswordIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const passwordField = this.closest('.input-group').querySelector('input');
                const iconId = this.querySelector('i').getAttribute('id');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    document.getElementById(iconId).classList.remove('bi-eye-slash-fill');
                    document.getElementById(iconId).classList.add('bi-eye');
                } else {
                    passwordField.type = 'password';
                    document.getElementById(iconId).classList.remove('bi-eye');
                    document.getElementById(iconId).classList.add('bi-eye-slash-fill');
                }
            });
        });
    });
</script>
<section></section>
@endsection
