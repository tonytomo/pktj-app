<div>
    {{-- Add alert --}}
    {{-- @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <h1>Create Product</h1>
    <form method="POST" action="{{ route('product.store') }}">
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
    <a href="{{ url('product') }}">
        <button>
            {{ __('Back') }}
        </button>
    </a>
</div>
