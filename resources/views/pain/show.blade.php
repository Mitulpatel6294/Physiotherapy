@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="bg-blue-50">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">

            <!-- TEXT -->
            <div>
                <h1 class="text-4xl font-bold text-blue-700">
                    {{ $pain->title }}
                </h1>

                <p class="mt-4 text-gray-600 text-lg">
                    {{ $pain->short_description }}
                </p>

                <a href="{{ url('/#appointment') }}"
                    class="inline-block mt-6 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                    Book Appointment
                </a>
            </div>

            <!-- MAIN IMAGE -->
            <div>
                <img src="{{ asset('storage/pains/' . $pain->main_image) }}" class="rounded-xl shadow w-full object-cover">
            </div>

        </div>
    </section>


    <!-- FULL DESCRIPTION -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-semibold text-gray-800">
                About This Condition
            </h2>

            <p class="mt-6 text-gray-600 leading-relaxed">
                {{ $pain->full_description }}
            </p>

        </div>
    </section>

    <!-- GALLERY -->
    @if ($pain->images->count())
        <section class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-6 text-center">

                <h2 class="text-3xl font-semibold text-gray-800">
                    Treatment Gallery
                </h2>

                <div class="grid md:grid-cols-3 gap-6 mt-10">

                    @foreach ($pain->images as $img)
                        <div class="bg-white p-2 rounded-xl shadow">
                            <img src="{{ asset('storage/sub_pains/' . $img->image_path) }}"
                                class="rounded-lg w-full h-52 object-cover">
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    @endif


    <!-- WHY CHOOSE US -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-semibold text-gray-800">
                Why Choose Our Treatment?
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
            Ready to Recover from {{ $pain->title }}?
        </h2>

        <a href="{{ url('/#appointment') }}"
            class="mt-6 inline-block bg-blue-600 text-white px-8 py-3 rounded-lg shadow hover:bg-blue-700">
            Book Appointment
        </a>
    </section>
@endsection
