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
        <form action="/pendaftaran/siswa" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan:</label>
                <select name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-select" required>
                    <option value="SMA">SMA</option>
                    <option value="SMK">SMK</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kota_sekolah" class="form-label">Kota Sekolah:</label>
                <select name="kota_sekolah" id="" class="form-select">
                    @foreach ($regencies as $regency)
                        <option value="{{ $regency->name }}">{{ $regency->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah:</label>
                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" required>
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

            <div class="form-group">
                <label for="pilihan">Pilih Jumlah Anggota Kelompok:</label>
                <select name="anggota_kelompok" id="anggota_kelompok" class="form-control">
                    @for($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div id="form-inputs">
                <!-- Form input akan ditambahkan di sini -->
            </div>



            <button onclick="alert('Data Terkirim, Silahkan Mengisi Dokumen Untuk Melanjutkan Pendaftaran')" type="submit" class="btn btn-primary px-4 py-2 text-center mb-3">Daftar</button>
        </form>
    </div>

    @include('layouts.footer')


    <script>
        document.getElementById('anggota_kelompok').addEventListener('change', function() {
            var pilihan = this.value;
            var formInputs = document.getElementById('form-inputs');
            formInputs.innerHTML = '';

            for (var i = 1; i <= pilihan; i++) {
                var div = document.createElement('div');
                div.classList.add('mb-3');
                div.innerHTML = `
                    <label for="input${i}" class="form-label">Anggota ${i}:</label>
                    <input type="text" name="anaggota_kelompok${i}" id="input${i}" class="form-control">
                `;
                formInputs.appendChild(div);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
