<nav class="navbar navbar-expand-lg" style="background-color: rgb(190, 190, 195);">
    <div class="container-fluid">
        <a class="navbar-brand img-fluid" href="#"><img src="{{ asset('Asset/img/kominfo-1.png') }}" alt=""
                style="width: 120px; height: 50%; " class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mx-auto ">
            </ul>

            @if (Route::has('login'))
                @auth
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle me-lg-5" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <a style="color: white"> Keluar</a>
                        </button>
                        <ul class="dropdown-menu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Keluar</a>
                            </form>
                        </ul>
                    </div>
                    <script>
                        function logout() {
                            document.getElementById('logout-form').submit();
                        }
                    </script>
                @else
                    <a href="{{ route('login') }}" class="login-button btn btn-primary me-5"
                        style="background-color: rgba(0, 81, 157, 0.9151784182);">Masuk</a>
                @endauth
            @endif

        </div>
    </div>
</nav>
