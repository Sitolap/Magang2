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
            <a class="navbar-brand img-fluid" href="#"><img src="{{ asset('Asset/img/kominfo-1.png') }}"
                    alt="" style="width: 120px; height: 50%; " class="img-fluid"></a>
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
                        <img src="{{ asset('Asset/img/carbon-user-avatar-filled.png') }}" alt=""
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
                        <h3>Daftar Pengajuan Magang</h3>
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
                        <form action="{{ route('mahasiswa.search') }}" method="GET">
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-primary mx-2 pt-2">Search</button>
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
                            <th>Nama
                                <div class="dropdown">
                                    <i class="fas fa-sort dropdown-toggle" role="button" id="namaDropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu" aria-labelledby="namaDropdown">
                                        <a class="dropdown-item"
                                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_asc']) }}">Nama
                                            A-Z</a>
                                        <a class="dropdown-item"
                                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_desc']) }}">Nama
                                            Z-A</a>
                                    </div>
                                </div>
                            </th>
                            <th>Instansi
                                <div class="dropdown">
                                    <i class="fas fa-sort dropdown-toggle" role="button" id="instansiDropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu" aria-labelledby="instansiDropdown">
                                        <a class="dropdown-item"
                                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_universitas_asc']) }}">Nama
                                            Universitas A-Z</a>
                                        <a class="dropdown-item"
                                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_universitas_desc']) }}">Nama
                                            Universitas Z-A</a>
                                    </div>
                                </div>
                            </th>
                            <th>Anggota Kelompok</th>
                            <th>Tanggal Pengajuan
                                <div class="dropdown">
                                    <i class="fas fa-sort dropdown-toggle" role="button" id="tanggalDropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu" aria-labelledby="tanggalDropdown">
                                        <a class="dropdown-item"
                                            href="{{ route('pemagang.sortir', ['sort_by' => 'created_at_asc']) }}">Tanggal
                                            Pengajuan Terbaru</a>
                                        <a class="dropdown-item"
                                            href="{{ route('pemagang.sortir', ['sort_by' => 'created_at_desc']) }}">Tanggal
                                            Pengajuan Terlama</a>
                                    </div>
                                </div>
                            </th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $i = 1; // Inisialisasi nomor urut
                        @endphp
                        @foreach ($pemagang as $pemagangs)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $pemagangs->nama }}</td>
                                <td>{{ $pemagangs->nama_universitas }}</td>
                                <td>{{ $pemagangs->anggota_kelompok }}</td>
                                <td>{{ $pemagangs->created_at }}</td>
                                <td>
                                    @if ($pemagangs->status === 'pengajuan terkirim')
                                        <p class="" style="background-color: #FFCD29">
                                        @elseif ($pemagangs->status === 'pengajuan dilihat')
                                        <p class="bg-success text-white">
                                        @elseif ($pemagangs->status === 'surat balasan dibuat')
                                        <p class="bg-success text-white">
                                        @elseif ($pemagangs->status === 'surat balasan tersedia')
                                        <p class="bg-success text-white">
                                        @elseif ($pemagangs->status === 'ditolak')
                                        <p class="bg-danger text-white">
                                        @elseif ($pemagangs->status === 'diterima')
                                        <p class="bg-success text-white">
                                    @endif
                                    {{ $pemagangs->status }}
                                </td>
                                <td>
                                    <a href ="/pemagang/{{ $pemagangs->id }}/detail">
                                        <button class="btn btn-primary">Detail</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


                <div class="pagination-info">
                    Menampilkan data {{ $pemagang->firstItem() }} sampai {{ $pemagang->lastItem() }} dari {{ $pemagang->total() }} jumlah total pendaftar
                </div>
                @include('pagination.custom', ['paginator' => $pemagang])
                <br>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>
