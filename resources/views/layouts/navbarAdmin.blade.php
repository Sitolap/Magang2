<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    <li class="nav-item">
        <a class="nav-link rounded text-white {{ Route::is('admin') ? 'bg-secondary' : '' }}"
            href="{{ route('admin') }}" onmouseover="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'"
            onmouseout="this.style.backgroundColor='rgb(190, 190, 195)'">
            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link rounded text-white {{ Route::is('pengajuan.magang') ? 'bg-secondary' : '' }}"
            href="{{ route('pengajuan.magang') }}" onmouseover="this.style.backgroundColor='rgb(190, 190, 195)'"
            onmouseout="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'">
            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Pengajuan
                Magang</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link rounded text-white {{ Route::is('pemagang') ? 'bg-secondary' : '' }}"
            href="{{ route('pemagang') }}" onmouseover="this.style.backgroundColor='rgb(190, 190, 195)'"
            onmouseout="this.style.backgroundColor='rgba(0, 81, 157, 0.9151784182)'">
            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline text-white">Daftar Pemagang</span>
        </a>
    </li>
</ul>
