<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="vh-100 bg-light">
    <x-navigation-bar />
    <div class="h-100 position-relative d-flex">
        <div class="d-flex flex-column gap-2 justify-content-center align-items-center flex-grow-1">
            <div class="h-100 d-flex flex-column justify-content-center">
                <h1 class="mb-4 text-success text-center fs-1 fw-bold">Selamat Datang</h1>
                <p class="text-center fs-5">di Sistem Peminjaman Aset PKTJ</p>
            </div>
        </div>
        <div class="p-4 h-100 bg-white shadow-lg">
            <div class="h-100 d-flex flex-column justify-content-center">
                @if (Auth::check())
                    <h2 class="mb-4 text-success text-center fs-3 fw-bold">Selamat datang, {{ Auth::user()->name }}!</h2>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('app') }}" class="btn btn-success">Dasbor</a>
                        <a href="{{ route('logout') }}" class="btn btn-outline-success">Keluar Akun</a>
                    </div>
                @else
                    <h2 class="mb-4 text-success text-center fs-3 fw-bold">Silakan masuk atau daftar</h2>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('login') }}" class="btn btn-success">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-success">Daftar</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-footer />
</body>

</html>
