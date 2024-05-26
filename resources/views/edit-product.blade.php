<div>
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $product->description }}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" value="{{ $product->price }}">
        </div>
        <div>
            <button type="submit">Update</button>
            <a href="{{ route('product.show', $product->id) }}">
                <button>
                    {{ __('Cancel') }}
                </button>
            </a>
        </div>
    </form>
</div>
