<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Aset</title>

    <!-- Custom Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    {{-- <div>
        <h1>Create Product</h1>
        <form method="POST" action="{{ route('asset.store') }}">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required>
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <button type="submit">
                {{ __('Create') }}
            </button>
        </form>
        <a href="{{ url('asset') }}">
            <button>
                {{ __('Back') }}
            </button>
        </a>
    </div>     --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100"
                            src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Buat
                    </h1>
                    <form action="{{ route('asset.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('home') }}">
                            <button class="btn btn-secondary">
                                {{ __('Cancel') }}
                            </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
