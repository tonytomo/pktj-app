<form method="POST" action="{{ route('login') }}"
    class="w-100 d-flex flex-column align-items-start justify-content-center gap-3">
    @csrf

    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Email</span>
        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required
            autocomplete="email" aria-label="Email" aria-describedby="basic-addon1">
    </div>

    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input id="password" type="password" name="password" class="form-control" required
            autocomplete="current-password" aria-label="Password" aria-describedby="basic-addon1">
    </div>

    <button type="submit" class="btn btn-success">
        {{ __('Masuk') }}
    </button>
    <div>
        <a href="{{ route('register') }}"
            class="link-success link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
            {{ __('Belum punya akun?') }}
        </a>
    </div>
</form>
