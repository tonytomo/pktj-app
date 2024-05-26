<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="vh-100 bg-light">
    <x-navigation-bar />

    <div class="h-100">
        <div class="container h-100">
            <div class="h-100 d-flex flex-row gap-4 justify-content-center align-items-center">
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <div class="card h-50 w-25">
                        <div class="card-body d-flex flex-column justify-content-end align-items-stretch">
                            <h5 class="card-title">Pengguna</h5>
                            <p class="card-text">Kelola pengguna</p>
                            <a href="{{ route('users.list') }}" class="btn btn-success">Lihat</a>
                        </div>
                    </div>
                @endif

                <div class="card h-50 w-25">
                    <div class="card-body d-flex flex-column justify-content-end align-items-stretch">
                        <h5
                            class="card-title
                                @if (Auth::user() && Auth::user()->role == 'admin') mt-4 @endif">
                            Aset</h5>
                        <p class="card-text">Lihat daftar aset</p>
                        <a href="{{ route('product.list') }}" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
