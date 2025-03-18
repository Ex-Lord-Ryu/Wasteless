@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0 justify-content-center align-items-center">
        <div class="col-11 col-md-9 bg-white rounded-4 shadow-sm overflow-hidden">
            <div class="row g-0">
                <div class="col-md-6 p-4">
                    <div class="login-form-container" style="max-width: 100%;">
                        <div class="mb-4">
                            <a href="{{ url('/') }}" class="d-inline-block mb-4">
                                <img src="{{ asset('img/logo/logo_auth.svg') }}" alt="Logo" height="24" class="me-2">
                            </a>
                            <h2 class="fw-bold mb-2">Login</h2>
                            <p class="text-muted">Welcome back! Please log in to access your account.</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label">Password</label>
                                    @if (Route::has('password.request'))
                                        <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                            Forgot Password?
                                        </a>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success py-2 w-100">
                                    Login
                                </button>
                            </div>

                            <div class="text-center mb-3">
                                <div class="position-relative">
                                    <hr>
                                    <span class="translate-middle px-3 bg-white text-muted small">OR</span>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <a href="{{ url('auth/google') }}" class="btn btn-light border py-2 w-100 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('img/google.png') }}" alt="Google" width="18" style="margin-right: 10px;">
                                    Login with Google
                                </a>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block p-0">
                    <div class="h-100 d-flex align-items-center justify-content-center rounded-end-4">
                        <img src="{{ asset('img/Picture-Auth.png') }}" alt="Fresh vegetables" class="img-fluid p-4" style="object-fit: cover; max-height: 100%; border-radius: 25px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle icon
            const eyeIcon = togglePassword.querySelector('svg');
            if (type === 'text') {
                eyeIcon.innerHTML = '<path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486z"/><path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829z"/><path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346z"/><path d="M12.5 1.5a.5.5 0 0 0-1 0v4a.5.5 0 0 0 1 0z"/><path d="M0 8s3-5.5 8-5.5a7.028 7.028 0 0 1 2.79.588l-.77.771A5.944 5.944 0 0 0 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.134 13.134 0 0 0 1.172 8c.058.087.122.183.195.288.335.48.83 1.12 1.465 1.755.165.165.337.328.517.486l-.708.709a8.966 8.966 0 0 1-2.288-2.45 11.93 11.93 0 0 1-.63-1.016c-.064-.123-.098-.19-.098-.19z"/><path d="M8 5.5a2.5 2.5 0 0 0 0 5 2.5 2.5 0 0 0 0-5m0 4a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m-3.5-2a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>';
            } else {
                eyeIcon.innerHTML = '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>';
            }
        });
    });
</script>
@endsection

