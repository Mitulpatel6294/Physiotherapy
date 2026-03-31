@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-blue-50 px-4">

        <div class="max-w-5xl w-full bg-white rounded-xl shadow-lg grid md:grid-cols-2 overflow-hidden">

            <div class="hidden md:flex flex-col justify-center items-center bg-green-600 text-white p-10">
                <h2 class="text-3xl font-bold">Join PhysioSync</h2>
                <p class="mt-4 text-center text-sm">
                    Create your account and start your recovery journey with expert care.
                </p>

                <img src="https://via.placeholder.com/250x200" class="mt-8 rounded-lg">
            </div>

            <div class="p-8">

                <h2 class="text-2xl font-bold text-gray-800 text-center">
                    Create Account
                </h2>

                <form method="POST" action="{{ route('register.post') }}" class="mt-6 space-y-4">
                    @csrf
                    <div>
                        <label class="text-sm text-gray-600">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required autofocus>

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm text-gray-600">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required>

                        @error('email','verify')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm text-gray-600">Password</label>
                        <input type="password" name="password"
                            class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required>

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="text-sm text-gray-600">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                            required>

                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- REGISTER BUTTON -->
                    @if ($errors->has('throttle'))
                        <div class="text-red-500 text-sm mb-3">
                            {{ $errors->first('throttle') }}
                        </div>
                    @endif
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
                        Send Otp
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                            Login
                        </a>
                    </p>

                    <p class="text-center text-sm text-gray-600 mt-4">

                        <a href="{{ url('/auth/google/redirect') }}" class="text-blue-600 hover:underline">
                            Or Login with Google ?
                        </a>
                    </p>

                </form>

            </div>
        </div>

    </section>
@endsection
