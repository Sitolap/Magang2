<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('layouts.navbar')

    <div class="row justify-content-center mt-sm-4">
        <div class="text-center">
            <img src="{{ asset('Asset/img/centang.png') }}" alt="" width="200px" height="200px">
        </div>
    </div>

    <div class="row text-center mt-lg-4 mt-sm-3">
        <h2>Fourmulir Pendaftaran Berhasil Terkirim</h2>
    </div>

    <div class="row text-center mt-lg-3 mt-sm-1">
        <p>Silahkan Lengkapi Pengisian <a href="{{ route('files.create') }}"><b>Unggah Dokumen</b></a></p>
    </div>

    <footer style="background-color: rgba(0, 81, 157, 0.9151784182);" class="fixed-bottom">
        <div class="container-fluid">
            <div class="row py-3 text-white text-center">
                <p><b>Copyright © 2024; Designed by Tim 1 Pendidikan Teknik Informatika dan Komputer Universitas Negeri Jakarta</b></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
