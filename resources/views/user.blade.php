<div>
    {{-- Create list of user and back button on the top --}}
    <div>
        <h1>Users</h1>
        <a href="{{ url('app') }}">
            <button>
                {{ __('Back') }}
            </button>
        </a>

        {{-- Loop through users --}}
        @foreach ($users as $user)
            <div>
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Role: {{ $user->role }}</p>
                <a href="{{ route('users.detail', $user->id) }}">
                    <button>
                        {{ __('View') }}
                    </button>
                </a>
            </div>
        @endforeach
    </div>
</div>

{{ $users->links() }}
