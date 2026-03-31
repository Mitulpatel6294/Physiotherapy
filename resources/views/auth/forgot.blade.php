@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-blue-50 px-4">

        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

            <h2 class="text-2xl font-bold text-center text-gray-800">Forgot Password</h2>

            {{-- ERROR --}}
            @error('email')
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm text-center">
                    {{ $message }}
                </div>
            @enderror

            {{-- SUCCESS --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-600 p-3 rounded mb-4 text-sm text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST" action="{{ route('otp.forgot') }}" class="space-y-4 mt-4">
                @csrf

                <div>
                    <label class="text-sm text-gray-600">Enter your email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                    Send OTP
                </button>
            </form>

        </div>
    </section>
@endsection
