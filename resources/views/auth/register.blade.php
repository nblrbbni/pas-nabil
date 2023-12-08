@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Create new account</h1>

        <div class="form-floating mb-3">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="floatingInput">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">Password</label>
            <span class="password-toggle-icon" onclick="togglePasswordVisibility('password')">
                <i id="password-icon" class="bi bi-eye"></i>
            </span>
        </div>

        <div class="form-floating mb-3">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">

            <label for="password-confirm">Confirm Password</label>
            <span class="password-toggle-icon" onclick="togglePasswordVisibility('password-confirm')">
                <i id="password-confirm-icon" class="bi bi-eye"></i>
            </span>
        </div>

        <button class="btn btn-primary w-100 py-2 mb-3" type="submit">Register</button>
        <p class="text-body-secondary">Already have account? <a href="/login">Sign in</a></p>
        <p class="mt-5 mb-3 text-body-secondary">&copy; Portal Berita 2023</p>
    </form>
@endsection

@push('scripts')
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var passwordIcon = document.getElementById(inputId + '-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            }
        }
    </script>
@endpush
