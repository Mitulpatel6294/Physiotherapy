@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-blue-50 px-4">

        <div class="max-w-5xl w-full bg-white rounded-xl shadow-lg grid md:grid-cols-2 overflow-hidden">

            <!-- LEFT SIDE -->
            <div class="hidden md:flex flex-col justify-center items-center bg-blue-600 text-white p-10">
                <h2 class="text-3xl font-bold">Welcome Back</h2>
                <p class="mt-4 text-center text-sm">
                    Access your physiotherapy dashboard and Book your appointments easily.
                </p>

                <img src="https://via.placeholder.com/250x200" class="mt-8 rounded-lg">
            </div>

            <!-- RIGHT SIDE (FORM) -->
            <div class="p-8">

                <h2 class="text-2xl font-bold text-gray-800 text-center">
                    Login to Your Account
                </h2>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mt-4 text-green-600 text-sm text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="text-sm text-gray-600">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required autofocus>

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm text-gray-600">Password</label>
                        <input type="password" name="password"
                            class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- LOGIN BUTTON -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                        Login
                    </button>

                    <!-- GOOGLE LOGIN -->
                    <a href="{{ url('/auth/google/redirect') }}"
                        class="block w-full text-center bg-red-500 text-white py-3 rounded-lg hover:bg-red-600">
                        Login with Google
                    </a>
                    <p class="text-center text-sm text-gray-600 mt-4">
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                            Forgot Password ?
                        </a>
                    <p class="text-center text-sm text-gray-600 mt-4">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                            Register
                        </a>
                    </p>

                </form>

            </div>
        </div>

    </section>
@endsection
