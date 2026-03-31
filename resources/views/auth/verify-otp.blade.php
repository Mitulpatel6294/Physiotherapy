@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-blue-50 px-4">

        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

            <h2 class="text-2xl font-bold text-center text-gray-800">Verify OTP</h2>

            {{-- ERROR --}}
            @error('otp', 'verify')
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm text-center">
                    {{ $message }}
                </div>
            @enderror

            @error('email', 'resend')
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm text-center">
                    {{ $message }}
                </div>
            @enderror

            {{-- ATTEMPTS --}}
            @if (session('attempts_left') !== null)
                <p class="text-sm text-gray-600 text-center mb-2">
                    Attempts left: {{ session('attempts_left') }}
                </p>
            @endif

            {{-- SUCCESS --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-600 p-3 rounded mb-4 text-sm text-center">
                    {{ session('success') }}
                </div>
            @endif  

            {{-- RESEND --}}
            <form method="POST" action="{{ route('otp.resend') }}" id="resendForm" class="text-center">
                @csrf
                <input type="hidden" name="email" value="{{ old('email', $email) }}">

                <button type="submit" id="resendBtn" class="text-blue-600 opacity-50 cursor-not-allowed" disabled>
                    Resend OTP
                </button>

                <p id="timer" class="text-sm text-gray-500 mt-2"></p>
            </form>

            {{-- VERIFY --}}
            <form method="POST" action="{{ route('otp.verify') }}" class="mt-4 space-y-4">
                @csrf
                <input type="hidden" name="email" value="{{ old('email', $email) }}">

                <div>
                    <label class="text-sm text-gray-600">Enter OTP</label>
                    <input type="text" name="otp" value="{{ old('otp') }}" required maxlength="6"
                        pattern="[0-9]{6}"
                        class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-green-400 text-center tracking-widest">
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
                    Verify
                </button>
            </form>

        </div>
    </section>

    <script>
        let seconds = Math.floor({{ session('remaining', 0) }});

        const resendBtn = document.getElementById('resendBtn');
        const timerText = document.getElementById('timer');

        function updateUI() {
            if (seconds <= 0) {
                resendBtn.disabled = false;
                resendBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                timerText.innerText = '';
            } else {
                resendBtn.disabled = true;
                timerText.innerText = `Resend available in ${Math.ceil(seconds)}s`;
            }
        }

        updateUI();

        const interval = setInterval(() => {
            if (seconds > 0) {
                seconds--;
                updateUI();
            } else {
                clearInterval(interval);
            }
        }, 1000);
    </script>
@endsection
