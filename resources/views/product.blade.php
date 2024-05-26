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

        {{-- Loop through products with same size card using responsive grid --}}
        <div class="container">
            <div class="row row-cols-1 row-cols-md-5 g-4 mb-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card mh-100">
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5
                                    class="card-title
                            @if ($product->stock == 0) text-danger @endif
                            ">
                                    {{ $product->name }}</h5>
                                <p class="h-25 card-text overflow-auto">{{ $product->description }}</p>
                            </div>
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <div class="card-footer">
                                <small class="text-muted">
                                    @if ($product->price == 0)
                                        GRATIS
                                    @else
                                        Harga: {{ Number::currency($product->price, in: 'IDR', locale: 'id_ID') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn btn-success">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
