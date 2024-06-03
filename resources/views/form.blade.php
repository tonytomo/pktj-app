<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="vh-100 bg-light">
    <div class="h-100 position-relative d-flex flex-lg-row flex-column">
        <div class="w-100 d-flex flex-column gap-2 justify-content-center align-items-center">
            <h1 class="mt-2 pt-5 border-bottom text-center text-success fs-1 fw-bold">PKTJ</h1>
            <p class="text-center fs-5">Sistem Peminjaman Aset</p>
        </div>
        <div class="p-4 w-100 bg-white shadow-lg">
            <div class="mw-100 h-100 d-flex flex-column align-items-start justify-content-center">
                <a href="{{ route('home') }}" class="btn btn-secondary">Beranda</a>
                <hr class="w-100">
                <h1 class="mb-4 fs-3">{{ $title }}</h1>

                @if ($type === 'login')
                    <x-login-form />
                @elseif ($type === 'register')
                    <x-register-form />
                @endif


                @if (session('message'))
                    <x-alert type="{{ session('type') }}" message="{{ session('message') }}" />
                @endif

                @if ($errors->any())
                    <x-alert type="danger" message="{{ $errors->first() }}" />
                @endif
            </div>
        </div>
    </div>
</body>

</html>
