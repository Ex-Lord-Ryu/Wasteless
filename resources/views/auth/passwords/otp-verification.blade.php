@extends('layouts.app')

@section('title', 'OTP Verification')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0 justify-content-center align-items-center">
        <div class="col-11 col-md-9 bg-white rounded-4 shadow-sm overflow-hidden">
            <div class="row g-0">
                <div class="col-md-6 p-4">
                    <div class="otp-form-container" style="max-width: 100%;">
                        <div class="mb-4">
                            <a href="{{ url('/') }}" class="d-inline-block mb-4">
                                <img src="{{ asset('img/logo/logo_auth.svg') }}" alt="Logo" height="24" class="me-2">
                            </a>
                            <h2 class="fw-bold mb-2 text-center">OTP CODE</h2>
                            <p class="text-muted text-center">Check your email, we've sent the code to your email!</p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.otp.verify') }}" class="mt-5">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="d-flex justify-content-center gap-2 mb-4">
                                @for ($i = 1; $i <= 6; $i++)
                                <input type="text"
                                    name="otp_code[]"
                                    id="otp-{{ $i }}"
                                    class="form-control text-center @error('otp_code') is-invalid @enderror"
                                    style="width: 50px; height: 50px; font-size: 18px; border-radius: 8px;"
                                    maxlength="1"
                                    autocomplete="off"
                                    inputmode="numeric"
                                    pattern="[0-9]*">
                                @endfor
                            </div>

                            @error('otp_code')
                                <div class="text-center mb-3">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror

                            <div class="text-center mb-4">
                                <p class="text-muted small">Code expires in: <span id="countdown">03:12</span></p>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success py-2 w-100">
                                    Verify
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('password.email') }}" class="d-grid gap-2 mb-4">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <button type="submit" class="btn btn-light border py-2 w-100">
                                Send again
                            </button>
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
        // Auto-focus and move to next input
        const otpInputs = document.querySelectorAll('input[name="otp_code[]"]');

        otpInputs.forEach((input, index) => {
            // Handle paste event on each input
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').trim();

                // Check if pasted content contains only numbers
                if (!/^\d+$/.test(pastedData)) {
                    return;
                }

                // Split the pasted string into individual digits
                const digits = pastedData.split('').slice(0, otpInputs.length);

                // Fill the inputs with the digits
                digits.forEach((digit, i) => {
                    if (i < otpInputs.length) {
                        otpInputs[i].value = digit;
                    }
                });

                // Focus the last filled input
                if (digits.length > 0) {
                    const lastIndex = Math.min(digits.length - 1, otpInputs.length - 1);
                    otpInputs[lastIndex].focus();
                }
            });

            input.addEventListener('keyup', function(e) {
                // If a digit is entered, move to the next input
                if (this.value.length === 1 && /^\d+$/.test(this.value)) {
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }

                // If backspace is pressed and current field is empty, focus previous field
                if (e.key === 'Backspace' && this.value.length === 0) {
                    if (index > 0) {
                        otpInputs[index - 1].focus();
                    }
                }
            });

            // Ensure only numbers are entered
            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });

        // Auto-focus first input on page load
        otpInputs[0].focus();

        // Countdown timer
        let timeLeft = 192; // 3 minutes and 12 seconds in seconds
        const countdownEl = document.getElementById('countdown');

        const countdownTimer = setInterval(function() {
            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
                countdownEl.textContent = "00:00";
                return;
            }

            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;

            countdownEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            timeLeft--;
        }, 1000);
    });
</script>
@endsection
