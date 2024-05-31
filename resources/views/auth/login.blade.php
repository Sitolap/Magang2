<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMAFO </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

</head>

<body>
    <div class="login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    {{ __('Email atau Password Salah') }}
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content text-center">
                                <h1 class="mb-lg-5 mb-sm-3">Selamat datang di SIMAFO</h1>
                                <p>Silahkan masuk untuk dapat mengakses halaman selanjutnya</p>
                                {{-- <div class="logo">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form role="form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    {{-- @if ($errors->any())
                                        <div class="alert alert-danger mt-2">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    {{ __('Email atau Password Salah') }}
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif --}}
                                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                                </form><a href="{{ route('password.confirm') }}" class="forgot-pass mt-3">Lupa Kata
                                    Sandi?</a><br><small>Tidak Punya Akun? </small><a href="{{ route('register') }}"
                                    class="signup mt-3">Daftar Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Copyright © 2024; Designed by Tim 1 Pendidikan Teknik Informatika dan Komputer Universitas Negeri Jakarta</p>
        </div>

    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
