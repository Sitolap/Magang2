<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(190, 190, 195);">
        <div class="container-fluid">
            <a class="navbar-brand img-fluid" href="#"><img src="Asset/img/kominfo-1.png" alt=""
                    style="width: 130px; height: 50%; " class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link active mx-4 text-white" aria-current="page" href="#beranda">
                            <h5>Beranda</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-4 text-white" href="#kategori-magang">
                            <h5>Kategori Magang</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-4 text-white" href="#persyaratan-dokumen">
                            <h5>Persyaratan Dokumen</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-4 text-white" href="#alur-pendaftaran">
                            <h5>Alur Pendaftaran</h5>
                        </a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle me-lg-5" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">Keluar</a>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-button btn btn-primary me-5"
                            style="background-color: rgba(0, 81, 157, 0.9151784182);">Masuk</a>

                    @endauth
                @endif
                {{-- <div class="login-button nav-item dropdown btn btn-primary me-5"
                    style="background-color: rgba(0, 81, 157, 0.9151784182);">
                    <a class="nav-link dropdown-toggle text-white " href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Masuk
                    </a>
                    <ul class="dropdown-menu bg-primary">
                        <li><a class="dropdown-item text-white" href="#">Admin</a></li>
                        <li><a class="dropdown-item text-white" href="/login.html">Magang</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="background-color: rgba(0, 81, 157, 0.9151784182) ;">
        <div class="row">
            <div class="col-5 text-white pt-lg-5 mt-lg-4 text-lg-center py-sm-5 my-sm-5 text-sm-center h1">Program
                Magang</div>
            <div class="col-7">
                <img src="Asset/img/rectangle-23824.png" alt="" class="opacity-50 img-fluid"
                    style="height:100%; width: 100%;">
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
            data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
            <h1 id="beranda">Pengantar</h1>
            <p class="fs-4">Kementerian Komunikasi dan Informatika (Kominfo) adalah lembaga pemerintah yang
                bertanggung jawab atas bidang komunikasi dan informasi. Bergerak di layanan publik bidang komunikasi
                penyiaran, informatika, perizinan, alat komunikasi dan lain-lain. Kementerian Komunikasi dan Informatika
                (Kominfo) membuka kesempatan bagi seluruh mahasiswa/sis​wa tanpa terkecuali yang berkeinginan untuk
                belajar dan mengembangkan diri melalui keterlibatan langsung dalam pelaksanaan tugas di Kementerian
                Komunikasi dan Informatika dalam rangka menyelesaikan studi Praktik Kerja Lapangan.</p><br>
            <h1 id="kategori-magang">Kategori Magang</h1>
            <p class="fs-4">Jenjang Pendidikan:</p>
            <ul>
                <li class="fs-5">Perguruan Tinggi pada jenjang <h4>D3/D4/S1/S2</h4>
                </li>
                <li class="fs-5">Sekolah Menengah Kejuruan (SMK)</li>
            </ul>
            <p class="fs-4">Tingkat Pendidikan:</p>
            <ul>
                <li class="fs-5">Mahasiswa/i minimal semester 4</li>
                <li class="fs-5">Siswa/i minimal kelas XII</li>
            </ul>
            <p class="fs-4">Jenis Pemagang :</p>
            <ul>
                <li class="fs-5">Individu</li>
                <li class="fs-5">Kelompok</li>
            </ul>
            <br>
            <h1 id="persyaratan-dokumen">Persyaratan Dokumen</h1>
            <ul>
                <li class="fs-5">Pass photo formal (3x4)</li>
                <li class="fs-5">Surat Pengantar dari Perguruan Tinggi atau Sekolah</li>
                <li class="fs-5">Transkrip nilai</li>
                <li class="fs-5">CV (Curiculum Vitae)</li>
                <li class="fs-5">Portofolio (opsional)</li>
            </ul>
            <br>

            <h1 id="alur-pendaftaran">Alur Pendaftaran</h1>
            <ul>
                <li class="fs-5">Registrasi akun untuk masuk mengakses E-Magang KOMINFO.</li>
                <li class="fs-5">Pemilihan Kategori Magang Jenjang Pendidikan (Perguruan Tinggi atau Sekolah) dan
                    Jenis Magang (mandiri atau kelompok).</li>
                <li class="fs-5">Isi dan lengkapi semua data diri pada form yang tersedia.</li>
                <li class="fs-5">Unggah seluruh persyaratan dokumen yang diperlukan.</li>
                <li class="fs-5">Kirim data diri dan persyaratan dokumen</li>
                <li class="fs-5">Tinjau proses status selanjutnya untuk mendapatkan surat balasan magang.</li>
            </ul>
        </div>
        <br>
        <div class="row">
            <div class="col-12 text-center text-md-center text-sm-center">
                <a href="/kategori-magang" class="button btn btn-primary text-center my-sm-4 py-sm-3 px-sm-5" onmouseover="this.style.backgroundColor='red'" onmouseout="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'"
                    style="background-color:rgba(0, 81, 157, 0.9151784182); ">
                    <h4>Daftar Sekarang</h4>
                </a>
            </div>
        </div>
    </div>

    <br>
    <!-- KATEGORI MAGANG -->


    <footer style="background-color:rgba(0, 81, 157, 0.9151784182) ;">
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-lg-4 col-sm-6 ps-lg-5 ps-sm-3">
                    <a href=""><img src="Asset/img/image-3.png" alt=""
                            style="height: 80%; width: 63%;"></a>
                </div>
                <div class="col-lg-3 col-sm-5 offset-1 py-5">
                    <p class="text-white fw-bold">Kementerian Komunikasi dan Informatika</p>
                    <a href="https://maps.google.com/maps?hl=id&gl=id&um=1&ie=UTF-8&fb=1&sa=X&ftid=0x2e69f5d47c71fdaf:0x56d2a62dc19ddbc9"
                        class="text-white text-decoration-none"><img src="Asset/img/mdi-address-marker.png"
                            alt="" style="height: 8%; width:5%"> Jl. Medan Merdeka Barat no. 9, Jakarta
                        10110</a>
                    <br><br>
                    <a href="humas@mail.kominfo.go.id" class="text-white text-decoration-none"><img
                            src="Asset/img/eva-email-fill.png" alt="" style="height: 8%; width:5%">
                        humas@mail.kominfo.go.id</a>
                    <br><br>
                    <a href="" class="text-white text-decoration-none"><img
                            src="Asset/img/fluent-call-12-filled-9N5.png" alt=""
                            style="height: 8%; width:5%"> (021) 3452841</a>
                </div>
                <div class="col-lg-3 col-sm-5 offset-1 py-5 ">
                    <p class="text-white fw-bold">Ikuti Kami</p>
                    <a href="https://instagram/kemenkominfo" class="text-white text-decoration-none"><img
                            src="Asset/img/mdi-instagram.png" alt="" style="height: 8%; width:5%">
                        @kemenkominfo</a>
                    <br>
                    <a href="https://twitter.com/kemkominfo" class="text-white text-decoration-none"><img
                            src="Asset/img/pajamas-x.png" alt="" style="height: 8%; width:5%">
                        @kemkominfo</a>
                    <br>
                    <a href="https://www.youtube.com/@KemkominfoTV" class="text-white text-decoration-none"><img
                            src="Asset/img/mingcute-youtube-fill.png" alt="" style="height: 8%; width:5%">
                        Kemkominfo TV
                    </a>
                    <br>
                    <a href="https://www.tiktok.com/@kemkominfo" class="text-white text-decoration-none"><img
                            src="Asset/img/iconoir-tiktok.png" alt="" style="height: 8%; width:5%">
                        @kemkominfo</a>
                    <br>
                    <a href="https://www.facebook.com/Kemkominfo" class="text-white text-decoration-none"><img
                            src="Asset/img/ic-baseline-facebook.png" alt="" style="height: 8%; width:5%">
                        Kemkominfo</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
