@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <section class="bg-blue-50">
        <div class="max-w-7xl mx-auto px-6 py-16 text-center">
            <h1 class="text-4xl font-bold text-blue-700">Our Physiotherapy Services</h1>
            <p class="mt-4 text-gray-600 text-lg">
                Personalized treatments designed to reduce pain and improve mobility.
            </p>
        </div>
    </section>

    <!-- TOGGLE BUTTONS -->
    <section class="py-10">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <div class="inline-flex bg-gray-100 rounded-lg p-1">
                <button onclick="showTab('services')" class="tab-btn px-6 py-2 rounded-lg bg-blue-600 text-white">
                    Services
                </button>

                <button onclick="showTab('tech')" class="tab-btn px-6 py-2 rounded-lg text-gray-600">
                    Technologies
                </button>
            </div>

        </div>
    </section>


    <!-- SERVICES -->
    <section id="services-tab" class="py-10">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <div class="grid md:grid-cols-3 gap-6 mt-6">

                @foreach (['Pain Management', 'Sports Injury Rehabilitation', 'Post-Surgery Rehab', 'Neurological Physiotherapy', 'Orthopedic Physiotherapy', 'Pediatric Physiotherapy', 'Geriatric Physiotherapy', 'Posture Correction & Ergonomics'] as $service)
                    <div class="bg-white rounded-xl shadow p-4 hover:shadow-md">
                        <img src="https://via.placeholder.com/300x200" class="rounded-lg w-full">

                        <h3 class="mt-4 font-semibold text-blue-600">
                            {{ $service }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Click to explore treatment details.
                        </p>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    <!-- TECHNOLOGIES -->
    <section id="tech-tab" class="py-10 hidden">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <div class="grid md:grid-cols-3 gap-6 mt-6">

                @foreach (['Electrotherapy (TENS, IFT)', 'Ultrasound Therapy', 'Laser Therapy', 'Shockwave Therapy', 'Traction Machines', 'CPM Machine', 'Exercise Therapy Equipment', 'Balance & Gait Training Tools'] as $tech)
                    <div class="bg-white rounded-xl shadow p-4 hover:shadow-md">
                        <img src="https://via.placeholder.com/300x200" class="rounded-lg w-full">

                        <h3 class="mt-4 font-semibold text-green-600">
                            {{ $tech }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Advanced tools for faster recovery.
                        </p>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    <!-- PROCESS -->
    <section class="bg-green-50 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-semibold text-gray-800">Our Treatment Process</h2>

            <div class="grid md:grid-cols-4 gap-6 mt-10">

                @foreach (['Consultation', 'Assessment', 'Treatment Plan', 'Recovery & Follow-up'] as $step)
                    <div class="bg-white p-6 rounded-xl shadow">
                        <h3 class="font-semibold text-green-600">{{ $step }}</h3>
                        <p class="text-sm text-gray-500 mt-2">
                            Step-by-step guided recovery process.
                        </p>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">
            Start Your Recovery Today
        </h2>

        <a href="{{ url('/#appointment') }}"
            class="mt-6 inline-block bg-green-600 text-white px-8 py-3 rounded-lg shadow hover:bg-green-700">
            Book Appointment
        </a>
    </section>

    <script>
        function showTab(tab) {
            const serviceTab = document.getElementById('services-tab');
            const techTab = document.getElementById('tech-tab');
            const buttons = document.querySelectorAll('.tab-btn');

            // reset buttons
            buttons.forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('text-gray-600');
            });

            if (tab === 'services') {
                serviceTab.classList.remove('hidden');
                techTab.classList.add('hidden');

                buttons[0].classList.add('bg-blue-600', 'text-white');
            } else {
                techTab.classList.remove('hidden');
                serviceTab.classList.add('hidden');

                buttons[1].classList.add('bg-blue-600', 'text-white');
            }
        }
    </script>
@endsection
