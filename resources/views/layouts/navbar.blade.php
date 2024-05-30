<nav class="navbar navbar-expand-lg" style="background-color: rgb(190, 190, 195);">
    <div class="container-fluid">
        <a class="navbar-brand img-fluid" href="/"><img src="{{ asset('Asset/img/kominfo-1.png ') }}" alt=""
                style="width: 120px; height: 50%; " class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mx-5 ">
                <li class="nav-item">
                    <a class="nav-link mx-sm-5 text-white rounded {{ Route::is('kategori-magang') ? 'text-white bg-primary rounded' : '' }}"
                        href="{{ route('kategori-magang') }}"
                        onmouseover="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'"
                        onmouseout="this.style.backgroundColor='rgb(190, 190, 195)'">
                        <span>Kategori Magang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-sm-5 text-white rounded {{ Route::is('pendaftaran.mahasiswa') ? 'text-white bg-primary rounded' : '' }}"
                        aria-current="page" href="{{ route('pendaftaran.mahasiswa') }}"
                        onmouseover="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'"
                        onmouseout="this.style.backgroundColor='rgb(190, 190, 195)'">
                        <span>Formulir Data Diri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-sm-5 text-white rounded {{ Route::is('files.create') ? 'text-white bg-primary rounded' : '' }}"
                        href="{{ route('files.create') }}"
                        onmouseover="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'"
                        onmouseout="this.style.backgroundColor='rgb(190, 190, 195)'">
                        <span>Unggah Dokumen</span>
                    </a>
                </li>
                <li class="nav-item">
                    @if (isset($pemagang))
                    <a class="nav-link mx-sm-5 text-white rounded {{ Route::is('status') ? 'text-white bg-primary rounded' : '' }}"
                        href="{{ route('status', ['id' => $pemagang->id]) }}"
                        onmouseover="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'"
                        onmouseout="this.style.backgroundColor='rgb(190, 190, 195)'">
                        <span>Status Pengajuan</span>
                    </a>
                    @endif
                </li>
            </ul>

            <div class="d-flex justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle me-5 mt-2" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <!-- Navbar blade template -->
                    <ul class="dropdown-menu">
                        <li>
                            @if (isset($pemagang))
                                <a class="dropdown-item" href="{{ route('status', ['id' => $pemagang->id]) }}">Status
                                    Pengajuan</a>
                            @else
                                <a class="dropdown-item" href="{{ route('kategori-magang') }}">Daftar Magang</a>
                            @endif
                        </li>
                        @if (isset($pemagang))
                            <li>
                                <a class="dropdown-item" href="{{ route('pemagang.show', ['id' => $pemagang->id]) }}">Surat
                                    Balasan</a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="{{ route('nilai') }}">Sertifikat</a>
                        </li>
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
    </div>
</nav>
