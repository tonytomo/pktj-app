<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>
</head>

<body>
    <div>
        <h1>Welcome</h1>

        {{-- If logged in, show logout button, else show login and register button --}}
        @if (Auth::check())
            <form method="GET" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    {{ __('Logout') }}
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">
                <button>
                    {{ __('Login') }}
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button>
                    {{ __('Register') }}
                </button>
            </a>
        @endif
    </div>
</body>

</html>
