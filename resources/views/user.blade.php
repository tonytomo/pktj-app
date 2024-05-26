<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pengguna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="vh-100 bg-light">
    <x-navigation-bar />

    {{-- Create list of user and back button on the top --}}
    <div class="h-100 d-flex flex-column gap-4 justify-content-center align-items-start p-5">
        <h1>Users</h1>
        <a href="{{ url('app') }}">
            <button class="btn btn-success">
                {{ __('Back') }}
            </button>
        </a>

        {{-- Loop through users with bootstrap table --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

    <x-footer />
</body>

</html>
