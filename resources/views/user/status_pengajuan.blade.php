<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Status Pengajuan Magang</h1>
                <h4>Detail Pendaftar Magang</h4>
                <p>Nama: {{ $pemagang->nama }}</p>
                <p>Email: {{ $pemagang->email }}</p>
                <p>Status: {{ $pemagang->status }}</p>

                @if ($pemagang->status == 'ditolak')
                    <div class="alert alert-danger">
                        <h4 class="alert-heading">Pengajuan Ditolak</h4>
                        <p>Maaf, pengajuan magang Anda ditolak. Terima kasih atas partisipasi Anda.</p>
                    </div>
                @elseif ($pemagang->status == 'diterima')
                    <div >
                        <h4 class="alert-heading">Pengajuan Diterima</h4>
                        <p>Terima kasih atas partisipasi Anda. Pengajuan magang
                            Anda telah diterima. Silahkan datang ke kantor kami pada tanggal
                            {{ $pemagang->magang_dimulai }} untuk proses pengambilan data.</p>
                    </div>
                @else
                    <div>
                        <div style="width: 100%; background-color: #e0e0e0;">
                            <div
                                style="width:
                                @if ($pemagang->status == 'pengajuan terkirim') 25%
                                @elseif($pemagang->status == 'pengajuan dilihat') 50%
                                @elseif($pemagang->status == 'surat balasan dibuat') 75%
                                @else 100% @endif;
                                background-color:
                                @if ($pemagang->status == 'pengajuan terkirim') #0000FF
                                @elseif($pemagang->status == 'pengajuan dilihat') #0000FF
                                @elseif($pemagang->status == 'surat balasan dibuat') #0000FF
                                @else #0000FF @endif;
                                padding: 5px; color: white;">
                                {{ $pemagang->status }}
                            </div style='background-color:'>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>

</html>
