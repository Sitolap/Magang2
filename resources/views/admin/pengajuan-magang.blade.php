<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <title>Pengajuan Magang</title>
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

                @if (Route::has('login'))
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle me-lg-5" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <a style="color: white"> Keluar</a>
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

                        @include('layouts.navbarAdmin')
                    <hr>
                </div>
            </div>


            <div class="col">
                <div class="container mt-sm-2">
                    <div class="row justify-content-around">
                        <div class="col-md-4">
                            <div class="">
                                <div class="card-body text-center">
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
                    <div class="text-black">
                        <h6 style="margin-left: 90px">Menampilkan 1-5 dari 25 </h6>
                    </div>

                    <style>
                        input[type="text"] {
                            padding: 8px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            font-size: 16px;
                        }

                        input[type="submit"] {
                            padding: 8px 16px;
                            background-color: #000cb4;
                            color: white;
                            border: none;
                            border-radius: 4px;
                            font-size: 16px;
                            cursor: pointer;
                        }

                        input[type="submit"]:hover {
                            background-color: #000cb4;
                        }
                    </style>

                    <div class="d-flex justify-content-end">
                        <form action="#" method="get">
                            <input type="text" name="search">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
                <br>

                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    th,
                    td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: left;
                        text-align: center;
                    }

                    th {
                        background-color: #f2f2f2;
                        text-align: center;
                    }

                    .diterima {
                        background-color: #00ff48;
                    }

                    .ditolak {
                        background-color: #D20000;
                    }

                    .pending {
                        background-color: #FFCD29;
                    }
                </style>

                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Anggota Kelompok</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemagangs as $pemagang)
                            <tr>
                                <td>1</td>
                                <td>{{ $pemagang->nama }}</td>
                                <td>{{ $pemagang->nama_universitas }}</td>
                                <td>{{ $pemagang->anggota_kelompok }}</td>
                                <td>{{ $pemagang->created_at }}</td>
                                <td>
                                    @if ($pemagang->status==='pengajuan terkirim')
                                        <p class="" style="background-color: #FFCD29">
                                    @elseif ($pemagang->status==='pengajuan dilihat')
                                        <p class="bg-success">
                                    @elseif ($pemagang->status==='surat balasan dibuat')
                                        <p class="bg-success">
                                    @elseif ($pemagang->status==='surat balasan tersedia')
                                        <p class="bg-success">
                                    @endif
                                    {{ $pemagang->status }}
                                </td>
                                <td>
                                    <a href ="/pemagang/{{ $pemagang->id }}/detail">
                                    <button class="btn btn-primary">Detail</button>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
                <br>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>
