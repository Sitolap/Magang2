<nav class="navbar navbar-expand-lg" style="background-color: rgb(190, 190, 195);">
    <div class="container-fluid">
        <a class="navbar-brand img-fluid" href="/"><img src="{{ asset('Asset/img/kominfo-1.png ') }}" alt=""
                style="width: 120px; height: 50%; " class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mx-auto ">
                <li class="nav-item">
                    <a class="nav-link active   mx-sm-5 text-white"
                        aria-current="page" href="/kategori-magang">
                        <span>Kategori Magang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active mx-sm-5 text-white" aria-current="page" href="/pendaftaran mahasiswa">
                        <span>Formulir Data Diri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-sm-5 text-white" href="#kategori-magang">
                        <span>Unggah Dokumen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-sm-5 text-white" href="#persyaratan-dokumen">
                        <span>Status Pengajuan</span>
                    </a>
                </li>
            </ul>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle me-lg-5" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">Keluar</a>
                        </form>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</nav>
