<div>
    {{-- Show asset detail, add button edit and delete --}}
    <div>
        <h1>{{ $asset->name }}</h1>
        <p>{{ $asset->description }}</p>
        <p>{{ $asset->price }}</p>

        {{-- If authenticated, then show button to edit and delete asset --}}
        @if (Auth::user())
            <a href="{{ route('asset.edit', $asset->id) }}">
                <button>
                    {{ __('Edit') }}
                </button>
            </a>
            <form method="POST" action="{{ route('asset.destroy', $asset->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif

        {{-- Button to app view using url --}}
        <a href="{{ url('asset') }}">
            <button>
                {{ __('Back') }}
            </button>
        </a>
    </div>
</div>
