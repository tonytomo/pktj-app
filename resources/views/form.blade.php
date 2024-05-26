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
    <x-navigation-bar />
    <div class="h-100 position-relative d-flex">
        <div class="d-flex flex-column gap-2 justify-content-center align-items-center flex-grow-1">
            <h1 class="mb-1 border-bottom border-success text-center text-success fs-1 fw-bold">PKTJ</h1>
            <p class="text-center text-success fs-5">Sistem Peminjaman Aset</p>
        </div>
        <div class="p-4 h-100 bg-white shadow-lg">
            <div class="h-100 d-flex flex-column justify-content-center">
                <h1 class="mb-4 text-center fs-3">{{ $title }}</h1>

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
    <x-footer />
</body>

</html>
