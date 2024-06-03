<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Aset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <x-navigation-bar />

    {{-- Create list of user and back button on the top --}}
    <div class="h-100 d-flex flex-column gap-4 justify-content-start align-items-start p-5">
        <h1 class="mt-5 pt-5">Daftar Aset</h1>
        <a href="{{ url('app') }}">
            <button class="btn btn-success">
                {{ __('Back') }}
            </button>
        </a>

        {{-- Loop through assets with same size card using responsive grid --}}
        <div class="container">
            <div class="row row-cols-1 row-cols-md-5 g-4 mb-4">
                @foreach ($assets as $asset)
                    <div class="col">
                        <div class="card mh-100">
                            <img src="{{ $asset->image }}" class="card-img-top" alt="{{ $asset->name }}">
                            <div class="card-body">
                                <h5
                                    class="card-title
                            @if ($asset->stock == 0) text-danger @endif
                            ">
                                    {{ $asset->name }}</h5>
                                <p class="h-25 card-text overflow-auto">{{ $asset->description }}</p>
                            </div>
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('asset.edit', $asset->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <form action="{{ route('asset.destroy', $asset->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
            <div class="btn btn-success">
                {{ $assets->links() }}
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
