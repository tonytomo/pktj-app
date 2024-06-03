<nav class="position-absolute z-3 w-100 navbar navbar-expand-lg">
    <div class="container-fluid px-4 m-5 bg-white shadow-lg">
        <a class="navbar-brand text-primary fs-1 fw-bold" href="{{ route('home') }}">SEWA ASET PKTJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Keluar Akun</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                @endif
            </ul>
            @if (Auth::check())
                <span class="navbar-text">
                    <i class="bi bi-person-badge"></i>
                </span>
            @endif
        </div>
    </div>
</nav>
