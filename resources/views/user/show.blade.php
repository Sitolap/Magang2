<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pemagang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.navbar')

    <div class=" d-flex justify-content-center align-items-center" style="margin-top: 120px">
        <div class="text-center">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1>Selamat, {{ $pemagang->nama }}!</h1>
            <p>Silahkan unduh surat balasan dan ID pemagang</p>
            <a href="{{ route('admin.download_surat_balasan', ['id' => $pemagang->id]) }}" class="btn btn-primary my-2">Surat Balasan <i class="bi bi-download"></i></a>
            <a href="#" class="btn btn-primary my-2">ID Card <i class="bi bi-download"></i></a>
        </div>
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
