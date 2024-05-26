<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Product Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Button to app view using url --}}
            <a href="{{ route('app') }}">
                <button>
                    {{ __('Back') }}
                </button>
            </a>

            {{-- If user role is admin show button to create product route --}}
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('product.create') }}">
                    <button>
                        {{ __('Create') }}
                    </button>
                </a>
            @endif

            {{-- Loop through products --}}
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if (Auth::user()->role == 'admin')
                            <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{ route('product.edit', $product->id) }}">
                                <button>
                                    {{ __('Edit') }}
                                </button>
                            </a>
                        @endif
                        <a href="{{ route('product.detail', $product->id) }}">
                            <button>
                                {{ __('Detail') }}
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
</div>

{{ $products->links() }}
