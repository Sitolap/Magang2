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

    <div class="container mt-3">
        <div class="row">
            <h3 class="text-center mt-sm-4">Laman Pengajuan Magang</h3>
        </div>
    </div>
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Surat Pengantar</b></label>
                <input class="form-control" type="file" id="surat_pengantar" placeholder="Upload Surat Pengantar"
                 name="surat_pengantar">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>CV</b></label>
                <input class="form-control" type="file" id="cv" name="cv">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Transkip Nilai</b></label>
                <input class="form-control" type="file" id="transkrip_nilai" name="transkrip_nilai">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Portofolio</b></label>
                <input class="form-control" type="file" id="portofolio" name="portofolio">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><b>Pas Foto</b></label>
                <input class="form-control" type="file" id="pas_foto" name="pas_foto">
            </div>

            <button onclick="alert('Dokumen Terkirim')" type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>

    </div>

    <footer style="background-color: rgba(0, 81, 157, 0.9151784182);">
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
