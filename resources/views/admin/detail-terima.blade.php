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
        .container1 {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Membuat 3 kolom dengan lebar yang sama */
            gap: 70px; /* Jarak antar elemen */
        }
        .rectangle {
            background-color: #8fbbe4;
            color: black;
            text-align: left;
            line-height: 20px; /* Tinggi setiap kolom */
            border-radius: 10px; 
            border: 1px solid black;
        }
        .rectangle1 {
            background-color: white;
            color: black;
            text-align: left;
            line-height: 15px; /* Tinggi setiap kolom */
            border-radius: 10px; 
            border: 1px solid black;
        }
        .rectangle2 {
            background-color: #3e98ec;
            color: black;
            text-align: left;
            line-height: 15px; /* Tinggi setiap kolom */
            border-radius: 10px; 
            border: 1px solid black;
        }
        .rectangle3 {
            background-color: #9ca6b1;
            color: black;
            text-align: center;
            line-height: 10px; /* Tinggi setiap kolom */
            border-radius: 10px; 
            border: 1px solid black;  
        }
        .rectangle3:hover {
            background-color: #236cca;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="rectangle2">
        <b>
            <h5><p class="mt-2 ms-2">Nama Pendaftar 1</p> </h5>
            <h5><p class="mt-2 ms-2">Perguruan Tinggi/Universitas</p><h5>
    </b>
        </div>
        <br>
        <div class="rectangle"><p class="mt-2 ms-2">Nama</p> </div>
        <div class="rectangle1"><p class="mt-2 ms-2">Jenjang Pendidikan</p></div>
        <div class="rectangle"><p class="mt-2 ms-2">Perguruan Tinggi/Universitas</p></div>
        <div class="rectangle1"><p class="mt-2 ms-2">Fakultas</p></div>
        <div class="rectangle"><p class="mt-2 ms-2">Program Studi</p></div>
        <div class="rectangle1"><p class="mt-2 ms-2">Periode Magang</p></div>
        <div class="rectangle"><p class="mt-2 ms-2 me-2">
            <label for="penempatan" class="form-label">Penempatan :</label>
            <input type="text" name="penempatan" id="penempatan" class="form-control" required>   
        </p></div>
        <div class="rectangle1"><p class="mt-2 ms-2 me-2">
            <label for="penugasan" class="form-label">Penugasan :</label>
            <input type="text" name="penugasan" id="penugasan" class="form-control" required>  
        </p></div>
        <br>
        <br>
        <div class="rectangle2">
        <b>
        <h5><p class="mt-2 ms-2">Dokumen</p><h5>
          </b>
        </div>
        <br>
        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Surat Balasan</b></label>
                <input class="form-control" type="file" id="surat_balasan" placeholder="Upload Surat Pengantar"
                 name="surat_balasan">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>ID Card</b></label>
                <input class="form-control" type="file" id="id_card" name="id_card">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Sertifikat</b></label>
                <input class="form-control" type="file" id="sertifikat" name="sertifikat">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Surat Keterangan</b></label>
                <input class="form-control" type="file" id="surat_keterangan" name="surat_keterangan">
            </div>

        </form>

    </div>
<br>
<br>
<div class="container1"> 
    <button class="rectangle3 ms-5 me-5" onclick="alert('Dokumen Terkirim')" type="submit" class="btn btn-primary"><p class="mt-2 ms-2"><b> Simpan </b></p></button>
    <button class="rectangle3 ms-5 me-5" onclick="alert('Selesi Magang')" type="submit" class="btn btn-primary"><p class="mt-2 ms-2"><b>Selesai Magang</b></p></button>
</div>
<script>
    function changeColor(button) {
        button.style.backgroundColor = "#007bff";
        button.style.color = "white";
    }
</script>
<br>
<br>
</body>