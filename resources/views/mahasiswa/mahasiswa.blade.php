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

    <div class="container">
        <div class="row">
            <h3 class="text-center mt-sm-4">Laman Pengajuan Magang</h3>
        </div>
    </div>
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- @if (session('success'))
            <div class="alert alert-success text-center font-weight-bold col-6 mx-auto my-5 rounded-pill shadow-lg"
                role="alert">
                {{ session('success') }}
            </div>
        @endif --}}
        <form action="/pendaftaran/mahasiswa" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan:</label>
                <select name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-select" required>
                    <option value="S1">S1</option>
                    <option value="D4">D4</option>
                    <option value="D4">D3</option>
                    <option value="D4">D2</option>
                    <option value="D4">D1</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kota_universitas" class="form-label">Kota Universitas:</label>
                <select name="kota_universitas" id="" class="form-select">
                    @foreach ($regencies as $regency)
                        <option value="{{ $regency->name }}">{{ $regency->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_universitas" class="form-label">Nama Universitas:</label>
                <input type="text" name="nama_universitas" id="nama_universitas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas:</label>
                <input type="text" name="fakultas" id="fakultas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="program_studi" class="form-label">Program Studi:</label>
                <input type="text" name="program_studi" id="program_studi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nomor_induk_mahasiswa" class="form-label">Nomor Induk Mahasiswa:</label>
                <input type="text" name="nomor_induk_mahasiswa" id="nomor_induk_mahasiswa" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">Nomor Telepon:</label>
                <input type="tel" name="no_telepon" id="no_telepon" class="form-control" required>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <label for="name">Periode Magang Dimulai</label>
                    <input type="date" class="form-control" name="magang_dimulai" id="magang_dimulai">
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="form-group col-md-4">
                    <label for="magang_berakhir" class="form-label">Tanggal Berakhir Magang:</label>
                    <input type="date" class="form-control" name="magang_berakhir" id="magang_berakhir" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="anggota_kelompok" class="form-label">Anggota Kelompok</label>
                <input type="text" name="anggota_kelompok" id="anggota_kelompok" class="form-control" required>
            </div>
            <!-- Checkbox untuk anggota kelompok -->
            <!-- Ganti dengan field yang sesuai dengan kebutuhan Anda -->

            <!--
             // Example:
             //
             // 1. Andi
             // 2. Budi
             // 3. Cindy
             -->

            <!-- Anggota Kelompok -->
            {{-- <div>
                <label for="anggota_kelompok">Anggota Kelompok:</label><br />
                <input type='checkbox' name='anggota_kelompok[]' value='Andi'> Andi<br />
                <input type='checkbox' name='anggota_kelompok[]' value='Budi'> Budi<br />
                <input type='checkbox' name='anggota_kelompok[]' value='Cindy'> Cindy<br />
            </div> --}}

            <button onclick="alert('Data Terkirim, Silahkan Mengisi Dokumen Untuk Melanjutkan Pendaftaran')" type="submit" class="btn btn-primary px-4 py-2 text-center mb-3">Daftar</button>
        </form>
    </div>

    @include('layouts.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
