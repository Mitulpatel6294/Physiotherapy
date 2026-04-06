@extends('layouts.app')

@php
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Faq[] $faqs
     * @var \App\Models\Setting|null $settings
     */
@endphp

@section('content')
    <!-- HERO -->
    <section class="bg-blue-50 py-16 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-700">Contact PhysioSync</h1>
        <p class="mt-4 text-gray-600">
            Get in touch with us for appointments, queries, or feedback.
        </p>
    </section>

    <!-- CONTACT INFO CARDS -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-6 text-center">

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold text-blue-600">Call Us</h3>
                <p class="mt-2 text-gray-600">{{ $settings?->phone ?? '+91 1234567890' }}</p>
                @if($settings?->phone2)
                    <p class="mt-1 text-gray-600">{{ $settings->phone2 }}</p>
                @endif
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold text-green-600">Email</h3>
                <p class="mt-2 text-gray-600">{{ $settings?->email ?? 'support@physiosync.com' }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold text-blue-600">Location</h3>
                <p class="mt-2 text-gray-600">{{ $settings?->location ?? 'Surat, Gujarat' }}</p>
            </div>

        </div>
    </section>

    <!-- CONTACT FORM -->
    <section class="bg-blue-100 py-16">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">

            <h2 class="text-2xl font-semibold text-center text-gray-800">Send a Message</h2>

            {{-- Success Flash --}}
            @if (session('success'))
                <div class="mt-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors Summary --}}
            @if ($errors->any())
                <div class="mt-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="grid md:grid-cols-2 gap-4 mt-6">
                @csrf

                {{-- Name --}}
                <div class="flex flex-col">
                    <input type="text" name="name" value="{{ old('name', auth()->user()?->name) }}" placeholder="Full Name"
                        class="p-3 border rounded @error('name') border-red-400 @enderror">
                    @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="flex flex-col">
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()?->phone) }}"
                        placeholder="Phone Number (optional)"
                        class="p-3 border rounded @error('phone') border-red-400 @enderror">
                    @error('phone')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="flex flex-col">
                    <input type="email" name="email" value="{{ old('email', auth()->user()?->email) }}" placeholder="Email"
                        class="p-3 border rounded @error('email') border-red-400 @enderror">
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Type --}}
                <div class="flex flex-col">
                    <select name="type" class="p-3 border rounded @error('type') border-red-400 @enderror">
                        <option value="">-- Select Type --</option>
                        <option value="feedback" {{ old('type') === 'feedback' ? 'selected' : '' }}>Feedback</option>
                        <option value="question" {{ old('type') === 'question' ? 'selected' : '' }}>Question</option>
                    </select>
                    @error('type')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Message --}}
                <div class="flex flex-col md:col-span-2">
                    <textarea name="message" placeholder="Your Message" rows="4"
                        class="p-3 border rounded @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-green-600 text-white py-3 rounded md:col-span-2 hover:bg-green-700 transition font-medium">
                    Submit Message
                </button>

            </form>

        </div>
    </section>


    <!-- MAP -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Find Us</h2>

            <div class="mt-8">
                <iframe class="w-full h-80 rounded-xl shadow"
                    src="{{ $settings?->map_url ?: 'https://maps.google.com/maps?q=surat&t=&z=13&ie=UTF8&iwloc=&output=embed' }}">
                </iframe>
            </div>
        </div>
    </section>

    <!-- QUICK ACTIONS -->
    <section class="bg-green-50 py-16 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Quick Actions</h2>

        <div class="mt-6 flex justify-center gap-4 flex-wrap">
            <a href="tel:{{ $settings?->phone ?? '+911234567890' }}"
                class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                Call Now
            </a>

            <a href="{{ url("/#appointment") }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Book Appointment
            </a>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center text-gray-800">FAQs</h2>

            <div class="mt-8 space-y-4">

                @forelse ($faqs ?? [] as $faq)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="font-semibold text-blue-600">{{ $faq->question }}</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            {{ $faq->answer }}
                        </p>
                    </div>
                @empty
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="font-semibold text-blue-600">How do I book an appointment?</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            You can book via our form or call us directly.
                        </p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="font-semibold text-blue-600">Do you treat all types of pain?</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            Yes, we handle a wide range of physiotherapy treatments.
                        </p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection