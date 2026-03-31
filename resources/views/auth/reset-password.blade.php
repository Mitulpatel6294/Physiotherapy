@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-blue-50 px-4">

        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

            <h2 class="text-2xl font-bold text-center text-gray-800">Reset Password</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.reset') }}" class="space-y-4 mt-4">
                @csrf

                <input type="hidden" name="email" value="{{ $email }}">

                <div>
                    <label class="text-sm text-gray-600">New Password</label>
                    <input type="password" name="password" required class="w-full mt-1 p-3 border rounded-lg">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="w-full mt-1 p-3 border rounded-lg">
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
                    Reset Password
                </button>
            </form>

        </div>
    </section>
@endsection
