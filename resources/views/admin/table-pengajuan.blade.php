<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama
                <div class="dropdown">
                    <i class="fas fa-sort dropdown-toggle" role="button" id="namaDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="namaDropdown">
                        <a class="dropdown-item"
                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_asc']) }}">Nama
                            A-Z</a>
                        <a class="dropdown-item"
                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_desc']) }}">Nama
                            Z-A</a>
                    </div>
                </div>
            </th>
            <th>Instansi
                <div class="dropdown">
                    <i class="fas fa-sort dropdown-toggle" role="button" id="instansiDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="instansiDropdown">
                        <a class="dropdown-item"
                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_universitas_asc']) }}">Nama
                            Universitas A-Z</a>
                        <a class="dropdown-item"
                            href="{{ route('pemagang.sortir', ['sort_by' => 'nama_universitas_desc']) }}">Nama
                            Universitas Z-A</a>
                    </div>
                </div>
            </th>
            <th>Anggota Kelompok</th>
            <th>Tanggal Pengajuan
                <div class="dropdown">
                    <i class="fas fa-sort dropdown-toggle" role="button" id="tanggalDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="tanggalDropdown">
                        <a class="dropdown-item"
                            href="{{ route('pemagang.sortir', ['sort_by' => 'created_at_asc']) }}">Tanggal
                            Pengajuan Terbaru</a>
                        <a class="dropdown-item"
                            href="{{ route('pemagang.sortir', ['sort_by' => 'created_at_desc']) }}">Tanggal
                            Pengajuan Terlama</a>
                    </div>
                </div>
            </th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

    </thead>
    <tbody>
        @php
            $i = 1; // Inisialisasi nomor urut
        @endphp
        @foreach ($pemagang as $pemagangs)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $pemagangs->nama }}</td>
                <td>{{ $pemagangs->nama_universitas }}</td>
                <td>{{ $pemagangs->anggota_kelompok }}</td>
                <td>{{ $pemagangs->created_at }}</td>
                <td>
                    @if ($pemagangs->status === 'pengajuan terkirim')
                        <p class="" style="background-color: #FFCD29">
                        @elseif ($pemagangs->status === 'pengajuan dilihat')
                        <p class="bg-success text-white">
                        @elseif ($pemagangs->status === 'surat balasan dibuat')
                        <p class="bg-success text-white">
                        @elseif ($pemagangs->status === 'surat balasan tersedia')
                        <p class="bg-success text-white">
                        @elseif ($pemagangs->status === 'ditolak')
                        <p class="bg-danger text-white">
                        @elseif ($pemagangs->status === 'diterima')
                        <p class="bg-success text-white">
                    @endif
                    {{ $pemagangs->status }}
                </td>
                <td>
                    <a href ="/pemagang/{{ $pemagangs->id }}/detail">
                        <button class="btn btn-primary">Detail</button>
                    </a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

<div class="pagination-info">
    Menampilkan data {{ $pemagang->firstItem() }} sampai {{ $pemagang->lastItem() }} dari {{ $pemagang->total() }} jumlah total pendaftar
</div>
@include('pagination.custom', ['paginator' => $pemagang])
<br>
