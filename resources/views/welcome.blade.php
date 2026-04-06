@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">

            <!-- Left Content -->
            <div>
                <h4 class="text-xl md:text-4xl font-bold text-blue-700 leading-tight">
                    Move Better. Live Pain-Free.
                </h4>

                <p class="mt-4 text-gray-600 text-lg">
                    Expert physiotherapy care for all types of pain and recovery needs.
                </p>

                <div class="mt-6 flex gap-4">
                    <a href="#appointment"
                        class="border border-blue-600 text-blue-600 px-6 py-3 rounded-lg hover:bg-blue-600  hover:text-white ">
                        Book Appointment
                    </a>

                    <a href="tel:{{ $settings?->phone ?? '+911234567890' }}"
                        class="border border-green-600 text-green-600 px-6 py-3 rounded-lg hover:bg-green-600  hover:text-white ">
                        Call Now
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div>
                <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5" alt="Physiotherapy"
                    class="rounded-xl shadow-lg w-full object-cover">
            </div>

        </div>
    </section>
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">
                What Pain Are You Facing?
            </h2>

            <div class="grid md:grid-cols-3 gap-6 mt-10">

                @foreach ($pains as $pain)
                    <a href="{{ route('pain.show', $pain->slug) }}"
                        class="block bg-white rounded-xl shadow hover:shadow-md overflow-hidden">

                        <!-- IMAGE -->
                        <div class="h-48 w-full">
                            <img src="{{ asset('storage/pains/' . $pain->main_image) }}" class="w-full h-full object-cover"
                                alt="{{ $pain->title }}">
                        </div>

                        <!-- CONTENT -->
                        <div class="p-5 text-left">
                            <h3 class="text-lg font-semibold text-blue-600">
                                {{ $pain->title }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                Click to explore treatment options
                            </p>
                        </div>

                    </a>
                @endforeach

            </div>
        </div>
    </section>
    <section class="bg-green-50 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Why Choose PhysioSync?</h2>

            <div class="grid md:grid-cols-4 gap-6 mt-10">

                @foreach (['Expert Therapists', 'Modern Techniques', 'Personalized Care', 'Fast Recovery Focus'] as $item)
                    <div class="bg-white p-6 rounded-xl shadow">
                        <h3 class="font-semibold text-green-600">{{ $item }}</h3>
                        <p class="text-sm text-gray-500 mt-2">
                            Proven and effective treatment approach.
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Our Services</h2>

            <div class="grid md:grid-cols-3 gap-6 mt-10">
                @forelse ($featuredServices as $service)
                    <div class="bg-white rounded-xl shadow p-4 text-left">
                        @if ($service->main_image)
                            <img src="{{ asset('storage/services/' . $service->main_image) }}" alt="{{ $service->title }}"
                                class="rounded-lg w-full h-48 object-cover">
                        @else
                            <div class="rounded-lg w-full h-48 bg-blue-50 flex items-center justify-center">
                                <span class="text-blue-300 text-4xl">🩺</span>
                            </div>
                        @endif

                        <span class="mt-3 inline-block text-xs font-medium bg-green-100 text-green-700 px-2 py-1 rounded-full">
                            {{ $service->category }}
                        </span>

                        <h3 class="mt-2 font-semibold text-blue-600">{{ $service->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $service->short_description }}</p>

                        <a href="{{ route('service') }}"
                            class="mt-4 inline-block text-sm text-blue-600 hover:underline font-medium">
                            Learn More →
                        </a>
                    </div>
                @empty
                    <p class="md:col-span-3 text-gray-400 text-sm">No featured services available at the moment.</p>
                @endforelse

            </div>
        </div>
    </section>
    <section class="bg-blue-50 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Patient Testimonials</h2>

            <div class="grid md:grid-cols-3 gap-6 mt-10">

                @forelse ($testimonials as $testimonial)
                    <div class="bg-white p-6 rounded-xl shadow">
                        <p class="text-gray-600 text-sm">
                            “{{ $testimonial->message }}”
                        </p>
                        <h4 class="mt-4 font-semibold text-blue-600">{{ $testimonial->name }}</h4>
                        @if ($testimonial->email)
                            <p class="text-xs text-gray-400 mt-1">{{ $testimonial->email }}</p>
                        @endif
                    </div>
                @empty
                    <p class="md:col-span-3 text-gray-400 text-sm">No testimonials available yet.</p>
                @endforelse

            </div>
        </div>
    </section>

    <section class="py-16 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">
            Still in Pain? Start Your Recovery Today.
        </h2>
        <a href="{{ url('/#appointment') }}"
            class="mt-6 inline-block bg-green-600 text-white px-8 py-3 rounded-lg shadow hover:bg-green-700">
            Book Appointment
        </a>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Visit Our Clinic</h2>

            <div class="mt-8">
                <iframe class="w-full h-80 rounded-xl shadow"
                    src="{{ $settings?->map_url ?: 'https://maps.google.com/maps?q=surat&t=&z=13&ie=UTF8&iwloc=&output=embed' }}">
                </iframe>
            </div>
        </div>
    </section>
    <section id="appointment" class="bg-blue-100 py-16">

        <div class="max-w-3xl mx-auto bg-blue-300 rounded-xl shadow p-8">

            <h2 class="text-3xl font-semibold text-center text-white">Book an Appointment</h2>

            @if(session('appointment_success'))
                <div
                    class="mt-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm text-center font-medium">
                    {{ session('appointment_success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('appointment.store') }}" method="POST" class="grid md:grid-cols-2 gap-4 mt-8">
                @csrf

                <input type="text" name="name" value="{{ old('name', auth()->user()?->name) }}" placeholder="Full Name"
                    class="p-3 rounded border text-black @error('name') border-red-500 @enderror" required>

                <input type="email" name="email" value="{{ old('email', auth()->user()?->email) }}" placeholder="Email"
                    class="p-3 rounded border text-black @error('email') border-red-500 @enderror" required>

                <input type="text" name="phone" value="{{ old('phone', auth()->user()?->phone) }}"
                    placeholder="Phone Number"
                    class="p-3 rounded border text-black @error('phone') border-red-500 @enderror" required>

                <input type="text" name="pain_area" value="{{ old('pain_area') }}" placeholder="Pain Area"
                    class="p-3 rounded border text-black @error('pain_area') border-red-500 @enderror" required>

                <input type="date" name="date" value="{{ old('date') }}"
                    class="p-3 rounded border text-black @error('date') border-red-500 @enderror" required>

                <input type="time" name="time" value="{{ old('time') }}"
                    class="p-3 rounded border text-black @error('time') border-red-500 @enderror" required>

                <textarea name="message" placeholder="Message"
                    class="p-3 rounded border text-black md:col-span-2 @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>

                <button type="submit"
                    class="bg-blue-500 text-white py-3 rounded shadow md:col-span-2 hover:bg-blue-700 font-medium transition">
                    Book Now
                </button>

            </form>

        </div>
    </section>

    @auth

        <div id="passwordModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">

                <h2 class="text-xl font-semibold text-gray-800">Set Your Password</h2>
                <p class="text-sm text-gray-500 mt-1">
                    Set a password to enable email login.
                </p>

                <form action="{{ route('password.set') }}" method="POST" class="mt-5 space-y-4">
                    @csrf

                    <div>
                        <label class="text-sm text-gray-600">New Password</label>
                        <input type="password" name="password" required
                            class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Confirm Password</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div class="flex justify-between items-center pt-2">

                        <button type="button" onclick="closeModal()" class="text-sm text-gray-500 hover:text-gray-700">
                            Skip
                        </button>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Save Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
    <script>
        function openModal() {
            document.getElementById('passwordModal').classList.remove('hidden');
            document.getElementById('passwordModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('passwordModal').classList.add('hidden');
            document.getElementById('passwordModal').classList.remove('flex');
        }
    </script>
    @auth
        @if (session('showSetPasswordModal'))
            <script>
                openModal();
            </script>
        @endif
    @endauth
@endsection