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
            <a class="navbar-brand img-fluid" href="#"><img src="{{ asset('Asset/img/kominfo-1.png') }}" alt=""
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

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="/dashboard-admin" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pengajuan-magang" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Pengajuan Magang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daftar-pemagang" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Daftar Pemagang</span>
                            </a>
                        </li>
                    </ul>

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
                <style>
        .container {
            display: grid;
            grid-template-columns: repeat(1, 1fr); /* Membuat 3 kolom dengan lebar yang sama */
            grid-template-rows: repeat(0, 1fr); /* Membuat 4 baris dengan tinggi yang sama */
            gap: 0px; /* Jarak antar elemen */
        }

        .rectangle {
            background-color: #00519de9;
            color: black;
            text-align: left;
            line-height: 40px; /* Tinggi setiap kolom */
            border-radius: 10px;
            border: 1px solid black;
        }
        .rectangle1 {
            background-color: white;
            color: black;
            text-align: left;
            line-height: 40px; /* Tinggi setiap kolom */
            border-radius: 10px;
            border: 1px solid black;
        }

        .rectangle input, .rectangle1 input {
            width: 50%;
            margin-left: 10px;
            background: transparent;
            border: none;
            border-bottom: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="rectangle">
        <b>
        <h5> Nama Pemagang </h5>
        <h5> Perguruan Tinggi/Univesitas <h5>
    </b>
        </div>
        <br>
        <div class="rectangle">Nama                         :{{ $pemagang->nama }}</div>
        <div class="rectangle1">Jenjang Pendidikan          :{{ $pemagang->jenjang_pendidikan }}</div>
        <div class="rectangle">Perguruan Tinggi/Universitas :{{ $pemagang->nama_universitas }}</div>
        <div class="rectangle1">Fakultas                    :{{ $pemagang->fakultas }}</div>
        <div class="rectangle">Program Studi                :{{ $pemagang->program_studi }}</div>
        <div class="rectangle1">Periode Magang              :{{ $pemagang->magang_dimulai }} sampai dengan {{ $pemagang->magang_berakhir }}</div>
        <form action="{{ route('pengajuan.update', $pemagang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="rectangle">Penempatan: <input type="text" name="penempatan" id="penempatan" value="{{ $pemagang->penempatan }}"></div>
            <div class="rectangle1">Penugasan: <input type="text" name="penugasan" value="{{ $pemagang->penugasan }}"></div>
            <div class="rectangle my-4">Dokumen</div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Surat Balasan</b></label>
                <input class="form-control" type="file" id="surat_balasan" name="surat_balasan">
                @if($pemagang->surat_balasan)
                    <a href="{{ Storage::url($pemagang->surat_balasan) }}" target="_blank">Lihat Surat Balasan</a>
                @endif
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>ID Card</b></label>
                <input class="form-control" type="file" id="id_card" name="id_card">
                @if($pemagang->id_card)
                    <a href="{{ Storage::url($pemagang->id_card) }}" target="_blank">Lihat ID Card</a>
                @endif
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Sertifikat</b></label>
                <input class="form-control" type="file" id="sertifikat" name="sertifikat">
                @if($pemagang->sertifikat)
                    <a href="{{ Storage::url($pemagang->sertifikat) }}" target="_blank">Lihat Sertifikat</a>
                @endif
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Surat Keterangan</b></label>
                <input class="form-control" type="file" id="surat_keterangan" name="surat_keterangan">
                @if($pemagang->surat_keterangan)
                    <a href="{{ Storage::url($pemagang->surat_keterangan) }}" target="_blank">Lihat Surat Keterangan</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
<br>
<br>
</html>

</body>
