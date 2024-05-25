<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <title>Pengajuan Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    @include('layouts.AdminNavbar')

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
                <style>
                    .container {
                        display: grid;
                        grid-template-columns: repeat(1, 1fr);
                        /* Membuat 3 kolom dengan lebar yang sama */
                        grid-template-rows: repeat(0, 1fr);
                        /* Membuat 4 baris dengan tinggi yang sama */
                        gap: 0px;
                        /* Jarak antar elemen */
                    }

                    .container1 {
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        /* Membuat 3 kolom dengan lebar yang sama */
                        gap: 10px;
                        /* Jarak antar elemen */
                        justify-content: center;
                    }

                    .rectangle {
                        background-color: #379bf8;
                        color: black;
                        text-align: left;
                        line-height: 40px;
                        /* Tinggi setiap kolom */
                        border-radius: 10px;
                        border: 1px solid black;
                    }

                    .rectangle1 {
                        background-color: white;
                        color: black;
                        text-align: left;
                        line-height: 40px;
                        /* Tinggi setiap kolom */
                        border-radius: 10px;
                        border: 1px solid black;
                    }
                </style>
                </head>

                <body>
                    <div class="container">
                        <div class="rectangle">
                            <b>
                                <h5> Nama Pendaftar Pemagang</h5>
                                <h5> Perguruan Tinggi/Univesitas <h5>
                            </b>
                        </div>
                        <form action="/pemagang/{{ $pemagang->id }}" method="POST">
                            @csrf

                            <div class="rectangle">
                                <p class="mt-2 ms-2">Nama: {{ $pemagang->nama }}</p>
                            </div>
                            <div class="rectangle1">Jenjang Pendidikan: {{ $pemagang->jenjang_pendidikan }}</div>
                            <div class="rectangle">Perguruan Tinggi/Universitas: {{ $pemagang->nama_universitas }}</div>
                            <div class="rectangle1">Fakultas: {{ $pemagang->fakultas }}</div>
                            <div class="rectangle">Program Studi: {{ $pemagang->program_studi }}</div>
                            <div class="rectangle1">Email: {{ $pemagang->email }}</div>
                            <div class="rectangle">No. Telepon: {{ $pemagang->no_telepon }}</div>
                            <div class="rectangle1">Periode Magang: {{ $pemagang->magang_dimulai }} Sampai
                                {{ $pemagang->magang_berakhir }}</div>
                            <div class="rectangle">Jumlah Anggota Kelompok</div>
                            <div class="rectangle1">Nama Anggota Kelompok: {{ $pemagang->anggota_kelompot }}</div>

                        </form>

                        <div class="rectangle mt-4">
                            <b>
                                <h5>Dokumen<h5>
                            </b>
                        </div>
                        <br>


                        <div class="container">


                            <div class="container">

                                    @foreach (['pas_foto', 'surat_pengantar', 'transkrip_nilai', 'cv', 'portofolio'] as $type)
                                        <div class="rectangle1">{{ ucfirst(str_replace('_', ' ', $type)) }}:
                                            @php
                                                $file = $files->where('file_type', $type)->first();
                                            @endphp
                                            @if ($file)
                                                <a href="{{ asset('storage/' . $file->file_path) }}">{{ $file->name }}</a>
                                            @else
                                                <span>Tidak ada file</span>
                                            @endif
                                        </div>
                                    @endforeach

                            </div>
                        </div>



                    </div>


                        <form action="{{ route('admin.pemagang.update-status', $pemagang->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                            @csrf
                            <div class="mt-3">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="pengajuan terkirim" {{ $pemagang->status == 'pengajuan terkirim' ? 'selected' : '' }}>Pengajuan Terkirim</option>
                                    <option value="pengajuan dilihat" {{ $pemagang->status == 'pengajuan dilihat' ? 'selected' : '' }}>Pengajuan Dilihat</option>
                                    <option value="surat balasan dibuat" {{ $pemagang->status == 'surat balasan dibuat' ? 'selected' : '' }}>Surat Balasan Dibuat</option>
                                    <option value="surat balasan tersedia" {{ $pemagang->status == 'surat balasan tersedia' ? 'selected' : '' }}>Surat Balasan Tersedia</option>
                                </select>
                            </div>

                            <div id="response-document" style="display: none;" class="mb-3">
                                <label for="response_document" class="form-label">Upload Surat Balasan:</label>
                                <input type="file" name="response_document" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update Status</button>
                        </form>

                        <div class="row">
                            <div class="col-6">
                                <form action="{{ route('admin.pemagang.accept', $pemagang->id) }}" method="POST" class="me-2">
                                    @csrf
                                    <button type="submit" class="btn btn-success d-block w-100">Diterima</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('admin.pemagang.reject', $pemagang->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger d-block w-100">Ditolak</button>
                                </form>
                            </div>
                        </div>




                    <br>
                    <br>

                    </html>

                </body>
