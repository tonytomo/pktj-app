<div>
    {{-- Show product detail, add button edit and delete --}}
    <div>
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}</p>

        {{-- If user role is admin show button to edit and delete product --}}
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('product.edit', $product->id) }}">
                <button>
                    {{ __('Edit') }}
                </button>
            </a>
            <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif

        {{-- Button to app view using url --}}
        <a href="{{ url('product') }}">
            <button>
                {{ __('Back') }}
            </button>
        </a>
    </div>
</div>
