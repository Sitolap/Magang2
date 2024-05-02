<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->

    @include('layouts.navbar')

    {{--  Isi Konten --}}
    <div class="container">
        <div class="row">
            <h3 class="text-center font-weight-bold mt-sm-4">Kategori Magang</h3>
        </div>

        <div class="container mt-sm-2" style="width: 25rem;">
            <div class="row justify-content-center align-items-center" style="height: 100%">
                <div class="card custom-card mx-auto btn-outline-primary" style="">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jenjang Pendidikan</h5>
                        <a href="/pendaftaran-mahasiswa" class="btn btn-primary my-sm-4 py-sm-3 px-sm-5">Perguruan
                            Tinggi</a>
                        <p><b>atau</b></p>
                        <a href="/pendaftaran/siswa"class="btn btn-primary my-sm-4 py-sm-3 px-sm-5">Sekolah</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer style="background-color: rgba(0, 81, 157, 0.9151784182);" class="fixed-bottom">
        <div class="container-fluid">
            <div class="row py-3 text-white text-center">
                <p><b>Copyright © 2024; Designed by Tim 1 Pendidikan Teknik Informatika dan Komputer Universitas Negeri
                        Jakarta</b></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
