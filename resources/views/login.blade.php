<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
</head>

<body>

    <div class="form-login">
        <div class="container p-4">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center mb-5">Sign in</h2>
                            <form>
                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control form-control-lg" placeholder="Username" />
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-three-dots"></i></span>
                                        <input id="passwordInput" type="password" class="form-control form-control-lg"
                                            placeholder="Password" />
                                        <button id="togglePassword" class="btn" type="button">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-check d-flex justify-content-end mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
                                    <label class="form-check-label ms-2" for="rememberPassword"> Remember password
                                    </label>
                                </div>

                                <div class="d-flex justify-content-between">

                                    <a class="btn btn-secondary btn-lg btn-block" type="submit" href="/index">Kembali</a>
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                </div>

                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('assets/js/login.js')}}"></script>

</body>

</html>

