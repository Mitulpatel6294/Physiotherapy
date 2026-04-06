@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="bg-blue-50">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">

            <div>
                <h1 class="text-4xl font-bold text-blue-700">
                    {{ $service->title }}
                </h1>

                <p class="mt-4 text-gray-600 text-lg">
                    {{ $service->short_description }}
                </p>

                <a href="{{ url('/#appointment') }}"
                    class="inline-block mt-6 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                    Book Appointment
                </a>
            </div>

            <div>
                <img src="{{ asset('storage/services/' . $service->main_image) }}"
                    class="rounded-xl shadow w-full object-cover">
            </div>

        </div>
    </section>

    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-semibold text-gray-800">
                About This {{ $service->category === 'technology' ? 'Technology' : 'Service' }}
            </h2>

            <p class="mt-6 text-gray-600 leading-relaxed">
                {{ $service->full_description }}
            </p>

        </div>
    </section>

    <!-- GALLERY -->
    @if ($service->images->count())
        <section class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-6 text-center">

                <h2 class="text-3xl font-semibold text-gray-800">
                    Gallery
                </h2>

                <div class="grid md:grid-cols-3 gap-6 mt-10">

                    @foreach ($service->images as $img)
                        <div class="bg-white p-2 rounded-xl shadow">
                            <img src="{{ asset('storage/sub_services/' . $img->image_path) }}"
                                class="rounded-lg w-full h-52 object-cover">
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    @endif
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-semibold text-gray-800">
                Services and treatments for this pain
            </h2>

            <div class="grid md:grid-cols-4 gap-6 mt-10">

                @forelse ($service->pains as $pain)
                    <div class="bg-white rounded-xl shadow p-4 text-left">
                        @if ($pain->main_image)
                            <img src="{{ asset('storage/pains/' . $pain->main_image) }}" alt="{{ $pain->title }}"
                                class="rounded-lg w-full h-48 object-cover">
                        @else
                            <div class="rounded-lg w-full h-48 bg-blue-50 flex items-center justify-center">
                                <span class="text-blue-300 text-4xl">🩺</span>
                            </div>
                        @endif

                        <h3 class="mt-2 font-semibold text-blue-600">{{ $pain->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $pain->short_description }}</p>

                        <a href="{{ route('pain.show', $pain->slug) }}"
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

    <!-- WHY CHOOSE US -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-semibold text-gray-800">
                Why Choose Our {{ $service->category === 'technology' ? 'Technology' : 'Service' }}?
            </h2>

            <div class="grid md:grid-cols-4 gap-6 mt-10">

                @foreach (['Expert Therapists', 'Modern Equipment', 'Personalized Plans', 'Fast Recovery'] as $item)
                    <div class="bg-white p-6 rounded-xl shadow">
                        <h3 class="font-semibold text-green-600">{{ $item }}</h3>
                        <p class="text-sm text-gray-500 mt-2">
                            Proven and effective care approach.
                        </p>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="bg-blue-100 py-16 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">
            Ready to Get Started with {{ $service->title }}?
        </h2>

        <a href="{{ url('/#appointment') }}"
            class="mt-6 inline-block bg-blue-600 text-white px-8 py-3 rounded-lg shadow hover:bg-blue-700">
            Book Appointment
        </a>
    </section>
@endsection