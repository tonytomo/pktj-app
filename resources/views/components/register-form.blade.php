<form method="POST" action="{{ route('register') }}"
    class="d-flex flex-column align-items-start justify-content-center gap-3">
    @csrf

    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Nama Lengkap</span>
        <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required
            autocomplete="name" aria-label="Name" aria-describedby="basic-addon1">
    </div>

    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Email</span>
        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required
            aria-label="Email" aria-describedby="basic-addon1">
    </div>

    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input id="password" type="password" name="password" class="form-control" required aria-label="Password"
            aria-describedby="basic-addon1">
    </div>

    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Konfirmasi Password</span>
        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required
            autocomplete="new-password" aria-label="Confirm Password" aria-describedby="basic-addon1">
    </div>

    <div>
        <button type="submit" class="btn btn-success">
            {{ __('Daftar') }}
        </button>
    </div>
    <div>
        <a href="{{ route('login') }}"
            class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
            {{ __('Sudah punya akun?') }}
        </a>
    </div>
</form>
