<title>Profil Pengguna</title>
@extends('user-login.index')

@section('content')
    <section>

        <div class="container mt-5">
            <div class="profile-user card p-4">
                <h3 style="font-weight: 700;">{{ $user->nama_lengkap }}</h3>
                <div class="profile-items my-4">
                    <p><strong>NIK:</strong> {{ $user->nik }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $user->tanggal_lahir }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin }}</p>
                    <p><strong>Alamat Domisili:</strong> {{ $user->alamat_domisili }}</p>
                    <p><strong>Pekerjaan:</strong> {{ $user->pekerjaan }}</p>
                    <p><strong>Status Perkawinan:</strong> {{ $user->status_perkawinan }}</p>
                    <p><strong>Username:</strong> {{ $user->username }}</p>
                </div>
                <div class="text-right">
                    <a href="{{ route('user-dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>

        <!-- Button to toggle between forms -->
        <div class="container mt-5">
            <div class="text-center">
                <button class="btn btn-primary mr-2" id="btn-change-username">Ganti Username</button>
                <button class="btn btn-primary" id="btn-change-password">Ganti Password</button>
            </div>
        </div>

        <!-- Form Ganti Username -->
        <div class="container mt-5" id="form-change-username" style="display: none;">
            <div class="card p-4">
                <h3>Form Ganti Username</h3>
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <form action="{{ route('profile.change-username') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username Baru</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <div class="input-group-append">
                                <span class="input-group-text toggle-password" id="toggle-password">
                                    <i class="bi bi-eye-slash-fill" id="toggle-password-icon"></i>
                                </span>
                            </div>
                            </div>
                            @error('password')
                                <div class="text-danger"><br>{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Ganti Username</button>
                </form>
            </div>
        </div>

        <!-- Form Ganti Password -->
        <div class="container mt-5" id="form-change-password" style="display: none;">
            <div class="card p-4">
                <h3>Form Ganti Password</h3>
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <form action="{{ route('profile.change-password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Password Saat Ini</label>
                        <div class="input-group">
                            <input type="password" name="current_password" id="current_password" class="form-control"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text toggle-password" id="toggle-current-password">
                                    <i class="bi bi-eye-slash-fill" id="toggle-current-password-icon"></i>
                                </span>
                            </div>
                            </div>
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                            <div class="input-group-append">
                                <span class="input-group
                                -group-text toggle-password"
                                    id="toggle-new-password">
                                    <i class="bi bi-eye-slash-fill" id="toggle-new-password-icon"></i>
                                </span>
                            </div>
                            </div>
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password" id="toggle-confirm-password">
                                        <i class="bi bi-eye-slash-fill" id="toggle-confirm-password-icon"></i>
                                        </span>
                                        </div>
                                        </div>
                                        @error('new_password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Ganti Password</button>
                </form>
            </div>
        </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordIcons = document.querySelectorAll('.toggle-password');
            const btnChangeUsername = document.getElementById('btn-change-username');
            const btnChangePassword = document.getElementById('btn-change-password');
            const formChangeUsername = document.getElementById('form-change-username');
            const formChangePassword = document.getElementById('form-change-password');

            // Toggle password visibility
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

            // Toggle form visibility
            btnChangeUsername.addEventListener('click', function() {
                formChangeUsername.style.display = 'block';
                formChangePassword.style.display = 'none';
            });

            btnChangePassword.addEventListener('click', function() {
                formChangeUsername.style.display = 'none';
                formChangePassword.style.display = 'block';
            });

            // Keep forms open when error occurs
            const errorForms = document.querySelectorAll('.form-error');
            errorForms.forEach(form => {
                if (form.style.display === 'block') {
                    const formId = form.getAttribute('id');
                    if (formId === 'form-change-username') {
                        formChangeUsername.style.display = 'block';
                    } else if (formId === 'form-change-password') {
                        formChangePassword.style.display = 'block';
                    }
                }
            });
        });
    </script>
@endsection

<style>
    .profile-user {
        padding: 20px;
        border-radius: 15px;
        background-color: #f8f9fa;
        box-shadow: 0px 0px 10px 0px #ccc;
    }

    .profile-items {
        margin-bottom: 20px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0px 0px 10px 0px #ccc;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-primary:focus,
    .btn-primary:active {
        box-shadow: none;
    }

    .alert {
        margin-bottom: 20px;
    }

    .input-group-text {
        cursor: pointer;
    }

    .toggle-password {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    /* Additional styling for form toggle buttons */
    .container .btn {
        margin: 0 10px 20px 10px;
    }
</style>
