@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-6 space-y-10">

        <!-- PAGE TITLE -->
        <div>
            <h1 class="text-3xl font-bold text-blue-600">Edit Profile</h1>
            <p class="text-gray-500 mt-1">Manage your account settings</p>
        </div>

        <!-- PROFILE INFO -->
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">Profile Information</h2>

            <form id="profileForm" method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf
                @method('PATCH')
                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" readonly
                        class="w-full mt-1 border rounded-lg px-4 py-2 text-gray-400 focus:ring-2 focus:ring-blue-500 ">
                </div>
                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required minlength="3"
                        maxlength="50" pattern="[A-Za-z ]+"
                        class="w-full mt-1 border rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Save Changes
                </button>
            </form>
        </div>

        <!-- PASSWORD -->
        @if (is_null(auth()->user()->password))
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">Set Password</h2>

                <form id="set_password" method="POST" action="{{ route('password.set') }}" class="space-y-5">
                    @csrf

                    <input type="password" name="password" placeholder="New Password" required minlength="8"
                        class="w-full mt-1 border rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-500">

                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                        minlength="8" class="w-full mt-1 border rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-500">

                    <button class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                        Set Password
                    </button>
                </form>
            </div>
        @else
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">Update Password</h2>

                <form id="passwordForm" method="POST" action="{{ route('password.update') }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <input type="password" name="current_password" placeholder="Current Password" required minlength="8"
                        class="w-full mt-1 border rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-500">

                    <input type="password" name="password" placeholder="New Password" required minlength="8"
                        class="w-full mt-1 border rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-500">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                        minlength="8" class="w-full mt-1 border rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-500">


                    <button class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                        Update Password
                    </button>
                    <br>
                    <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                        Forgot Password ?
                    </a>
                </form>
            </div>
        @endif

    </div>

    <script>
        function confirmSubmit(formId, title, text) {
            const form = document.getElementById(formId);
            if (!form) return;

            form.addEventListener('submit', function(e) {
                if (!e.target.checkValidity()) return;

                e.preventDefault();

                Swal.fire({
                    title: title,
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, continue',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        }

        confirmSubmit('profileForm', 'Update Profile?', 'Your profile data will be changed.');
        confirmSubmit('set_password', 'set Password?', 'Your Password will be set.');
        confirmSubmit('passwordForm', 'Change Password?', 'Your password will be updated.');
    </script>
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('status') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: `{!! implode('<br>', $errors->all()) !!}`
            });
        </script>
    @endif
@endsection
