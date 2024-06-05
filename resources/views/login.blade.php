<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
@stack('css')
    <title>Login Page</title>
</head>
<body>

    <!-- Main Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!-- Login Container -->
        <div class="row border rounded-5 p-3 bg-white shadow login-box-area">

            <!-- Left Box -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column login-left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="{{-- asset('assets/img/faq.jpg') --}}" class="img-fluid" style="width: 250px;">
                </div>
                {{-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small> --}}
            </div>

            <!-- Right Box -->
            <div class="col-md-6 login-right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Selamat Datang</h2>
                        <p>Sistem Informasi RW.</p>
                    </div>
                    <form action="{{route('proses_login')}}" method="POST">
                        @csrf
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control form-control-lg bg-light fs-6 @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" placeholder="NIK Atau Username" autofocus required>
                        </div>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="bi bi-three-dots"></i></span>
                            <input id="passwordInput" type="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                            <button id="togglePassword" class="btn" type="button">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group my-4">
                            <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Login</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybA6YQ+eAq0h/Gy7I6UXAq74emZv5FjkTt4NfRTpV0eDUx9PX" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuH8co2/BrgWj6Ea9b6gtVd3flz2lcFNp2Y3GdO2zI5M8qJ9Hi9SLtVjEJHYbOuH" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
@stack('js')

</body>
</html>
