<nav class="z-3 position-fixed w-100 p-0 navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid shadow text-light">
        <a class="navbar-brand text-light fs-1 fw-bold" href="{{ route('home') }}">PKTJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="{{ route('app') }}">Dasbor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="{{ route('logout') }}">Keluar Akun</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <li class="nav-item border border-light rounded px-1 m-0">
                        <h3>ADMIN</h3>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
