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
        {{-- Create card of user if admin, aset, profil --}}
        <div class="container h-100">
            <div class="h-100 d-flex flex-row justify-content-center align-items-center">
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <div class="col-4">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">Pengguna</h5>
                                <p class="card-text">Kelola pengguna</p>
                                <a href="{{ route('users.list') }}" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-4">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5
                                class="card-title
                                @if (Auth::user() && Auth::user()->role == 'admin') mt-4 @endif">
                                Aset</h5>
                            <p class="card-text">Kelola aset</p>
                            <a href="{{ route('product.list') }}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5
                                class="card-title

                                @if (Auth::user() && Auth::user()->role == 'admin') mt-4 @endif">
                                Profil</h5>
                            <p class="card-text">Lihat profil</p>
                            <a href="{{ route('users.detail', Auth::user()->id) }}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
