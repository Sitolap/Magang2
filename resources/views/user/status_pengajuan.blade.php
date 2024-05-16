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
                <h4 class="text-center mb-4">Status Pengajuan Magang</h4>
                <h1>Detail Pendaftar Magang</h1>
                    <p>Nama: {{ $pemagang->nama }}</p>
                    <p>Email: {{ $pemagang->email }}</p>
                    <p>Status: {{ $pemagang->status }}</p>

                    {{-- <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%">
                            {{ $status }}
                        </div>
                    </div> --}}

                {{-- <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar"
                        style="width: {{ $pemagang->progress }}%"
                        aria-valuenow="{{ $pemagang->progress }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $pemagang->statusText }}</div>
                </div> --}}

                <div>
                    <div style="width: 100%; background-color: #e0e0e0;">
                        <div
                            style="width:
                    @if ($pemagang->status == 'pengajuan terkirim') 25%
                    @elseif($pemagang->status == 'pengajuan dilihat') 50%
                    @elseif($pemagang->status == 'surat balasan dibuat') 75%
                    @else 100%
                    @endif;
                    background-color: #4caf50; padding: 5px; color: white;">
                            {{ $pemagang->status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
