<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <!-- Custom Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="vh-100 bg-light">
    <x-navigation-bar />
    <div class="container-fluid header bg-light p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Kepuasan anda <span class="text-primary">adalah</span>
                    prioritas kami</h1>
                <p class="animated fadeIn mb-4 pb-2">.</p>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ asset('images/PKTJL.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="{{ asset('images/pktj.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">POLITEKNIK KESELAMATAN TRANSPORTASI JALAN TEGAL</h1>
                    <p class="mb-4">Politeknik Keselamatan Transportasi Jalan (PKTJ) adalah perguruan tinggi kedinasan
                        yang diselenggarakan oleh Kementrian Perhubungan Republik Indonesia. Perguruan tinggi ini
                        didirikan pada 14 Mei 1971 dengan nama Balai Diklat Trans Jaya. PKTJ berlokasi di Kota Tegal,
                        Jawa Tengah.
                    </p>

                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('about') }}">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 border-top"></div>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5">Sewa Aset</h1>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-5 g-4 mb-4">
                    @foreach ($assets as $asset)
                        <div class="col">
                            <div class="card mh-100">
                                <img src="{{ $asset->image }}" class="card-img-top" alt="{{ $asset->name }}">
                                <div class="card-body">
                                    <h5
                                        class="card-title
                            @if ($asset->stock == 0) text-primary fw-bold fs-6 @endif
                            ">
                                        {{ $asset->name }}</h5>
                                    <p class="h-25 card-text text-truncate" style="max-width: 200px">
                                        {{ $asset->description }}</p>
                                </div>
                                @if (Auth::check())
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('asset.edit', $asset->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('asset.destroy', $asset->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-secondary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                <div class="card-footer">
                                    <small class="text-muted">
                                        @if ($asset->price == 0)
                                            GRATIS
                                        @else
                                            Harga: {{ Number::currency($asset->price, in: 'IDR', locale: 'id_ID') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="btn btn-primary">
                    {{ $assets->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
