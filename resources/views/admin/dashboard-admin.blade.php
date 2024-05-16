<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg" style="background-color: rgb(190, 190, 195);">
        <div class="container-fluid">
            <a class="navbar-brand img-fluid" href="#"><img src="Asset/img/kominfo-1.png" alt=""
                    style="width: 120px; height: 50%; " class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mx-auto ">
                </ul>

            </div>

            @if (Route::has('login'))
                @auth
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle me-lg-5" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <a style="color: white"> Keluar </a>
                        </button>
                        <ul class="dropdown-menu">
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="#" onclick="logout()">Keluar</a>
                            </form>
                        </ul>
                    </div>
                    <script>
                        function logout() {
                            document.getElementById('logout-form').submit();
                        }
                    </script>
                @else
                    <a href="{{ route('login') }}" class="login-button btn btn-primary me-5"
                        style="background-color: rgba(0, 81, 157, 0.9151784182);">Masuk</a>
                @endauth
            @endif

        </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #00519de9">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <br>
                    <a href="#"
                        class="d-flex align-items-center pb-8 mb-md-0 me-md-auto text-white text-decoration-none">

                        <img src="Asset/img/carbon-user-avatar-filled.png" alt=""
                            style="width: 50px; height: 100%;" class="img-fluid me-3">
                        <div class="d-flex flex-column">
                            <span class="fs-5 d-none d-sm-inline mb-2">
                                @if (Route::has('login'))
                                    @auth
                                        {{ Auth::user()->name }}
                                    @else
                                    @endauth
                                @endif
                            </span>
                            <span class="text-muted"></span>
                        </div>
                    </a>


                    <br>

                    <style>
                        .highlight {
                            background-color: #8E8E8E80 !important;
                        }
                    </style>

                    @include('layouts.navbarAdmin')

                    <hr>
                </div>
            </div>


            <div class="col">
                <div class="container mt-sm-2">
                    <div class="row justify-content-around">
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">25</h1>
                                    <h5>Pengajuan Magang</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">15</h1>
                                    <h5>Peserta Magang</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="container">
                    <div class="text-primary">
                        <h3 style="margin-left: 90px;">Daftar Pengajuan Magang</h3>
                    </div>
                    <br>
                    <div class="container mt-sm-2">
                    <div class="row justify-content-around">
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">0</h1>


  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
  12
  <span class="visually-hidden"> Jakarta </span>
  </span>

                                    <h5>Jakarta</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">0</h1>
                                    <h5>Tangerang</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">0</h1>
                                    <h5>Bogor</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="container mt-sm-2">
                    <div class="row justify-content-around">
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">0</h1>
                                    <h5>Bekasi</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">0</h1>
                                    <h5>Depok</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card custom-card mx-auto btn-outline-primary">
                                <div class="card-body text-center">
                                    <h1 class="card-title">0</h1>
                                    <h5>Tangerang Selatan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
