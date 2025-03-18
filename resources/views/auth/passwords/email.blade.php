@extends('layouts.app')

@section('title', 'Reset Password')

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
                            <h2 class="fw-bold mb-2">Reset Password</h2>
                            <p class="text-muted">Enter your email address and we'll send you a verification code to reset your password.</p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" id="resetForm">
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

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-success py-2 w-100">
                                    Send Verification Code
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Remember your password? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>
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
@endsection
