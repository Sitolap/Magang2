<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Surat Balasan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        .header,
        .footer {
            text-align: center;
        }

        .content {
            margin-top: 20px;
        }

        .content p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Surat Penerimaan Magang</h1>
        </div>
        @if ($pemagang)
            <div class="content">
                <p>Nama: {{ $pemagang->nama }}</p>
                <p>Perguruan Tinggi: {{ $pemagang->nama_universitas }}</p>
                <p>Periode Magang: {{ $pemagang->magang_dimulai }} sampai {{ $pemagang->magang_berakhir }}</p>
                <p>Anggota Kelompok: {{ $pemagang->anggota_kelompok }}</p>
                <p>Posisi: {{ $pemagang->penempatan }}</p>
                <p>Tanggal Penerimaan: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
            </div>
        @else
            <p>Data pemagang tidak ditemukan.</p>
        @endif
        <div class="footer">
            <p>Terima kasih telah mengajukan permohonan magang.</p>
        </div>
    </div>
</body>

</html>
