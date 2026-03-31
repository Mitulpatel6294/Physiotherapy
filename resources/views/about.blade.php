@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="bg-blue-50 py-16 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-700">About PhysioSync</h1>
        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
            Helping people recover, move better, and live pain-free with expert physiotherapy care.
        </p>
    </section>

    <!-- MISSION / VISION -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10">
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-2xl font-semibold text-blue-600">Our Mission</h2>
                <p class="mt-4 text-gray-600">
                    To provide effective, personalized physiotherapy treatment that improves quality of life.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-2xl font-semibold text-green-600">Our Vision</h2>
                <p class="mt-4 text-gray-600">
                    To become a trusted physiotherapy center known for recovery-focused care and innovation.
                </p>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="bg-green-50 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Why Choose Us</h2>

            <div class="grid md:grid-cols-4 gap-6 mt-10">
                @foreach (['Expert Therapists', 'Modern Equipment', 'Personalized Plans', 'Fast Recovery'] as $item)
                    <div class="bg-white p-6 rounded-xl shadow">
                        <h3 class="text-green-600 font-semibold">{{ $item }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="py-16 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">How It Works</h2>

        <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-4 gap-6 mt-10">
            @foreach (['Book Appointment', 'Assessment', 'Treatment', 'Recovery'] as $step)
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-blue-600 font-semibold">{{ $step }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    <!-- TEAM -->
    <section class="bg-blue-50 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Meet Our Therapists</h2>

            <div class="grid md:grid-cols-3 gap-8 mt-10">

                @foreach ([
            [
                'name' => 'Dr. Rahul Mehta',
                'role' => 'Senior Physiotherapist',
                'desc' => 'Specialist in orthopedic rehabilitation and chronic pain management.',
                'img' => 'https://via.placeholder.com/200',
            ],
            [
                'name' => 'Dr. Priya Shah',
                'role' => 'Sports Injury Expert',
                'desc' => 'Focused on sports recovery and performance improvement.',
                'img' => 'https://via.placeholder.com/200',
            ],
            [
                'name' => 'Dr. Amit Patel',
                'role' => 'Rehabilitation Specialist',
                'desc' => 'Expert in post-surgery recovery and mobility improvement.',
                'img' => 'https://via.placeholder.com/200',
            ],
        ] as $therapist)
                    <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">

                        <img src="{{ $therapist['img'] }}" class="w-32 h-32 mx-auto rounded-full object-cover">

                        <h3 class="mt-4 text-lg font-semibold text-blue-600">
                            {{ $therapist['name'] }}
                        </h3>

                        <p class="text-sm text-green-600">
                            {{ $therapist['role'] }}
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            {{ $therapist['desc'] }}
                        </p>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="py-16 text-center">
        <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-4 gap-6">
            @foreach (['500+ Patients', '10+ Experts', '5+ Years', '100% Care'] as $stat)
                <div>
                    <h3 class="text-2xl font-bold text-blue-600">{{ $stat }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="bg-green-50 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Patient Feedback</h2>

            <div class="grid md:grid-cols-3 gap-6 mt-10">
                @for ($i = 0; $i < 3; $i++)
                    <div class="bg-white p-6 rounded-xl shadow">
                        <p class="text-gray-600 text-sm">
                            “Great recovery experience. Highly recommended.”
                        </p>
                        <h4 class="mt-4 font-semibold text-green-600">Patient</h4>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">
            Ready to Start Your Recovery?
        </h2>
        <a href="{{ url('/#appointment') }}"
            class="mt-6 inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">
            Book Appointment
        </a>
    </section>
@endsection
