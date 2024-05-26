<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    {{-- Alert --}}
    <x-alert type="success" message="lmao" />

    {{-- Content --}}
    <div>
        <h1>Profile</h1>
        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Role: {{ Auth::user()->role }}</p>
    </div>

    {{-- If user role is admin, show button to user --}}
    @if (Auth::user()->role == 'admin')
        <a href="{{ route('users.list') }}">
            <button>
                {{ __('Users') }}
            </button>
        </a>
    @endif

    {{-- Button to product view using url --}}
    <a href="{{ url('product') }}">
        <button>
            {{ __('Products') }}
        </button>
    </a>

    {{-- Button to logout --}}
    <form method="GET" action="{{ route('logout') }}">
        @csrf
        <button type="submit">
            {{ __('Logout') }}
        </button>
    </form>
</body>

</html>
