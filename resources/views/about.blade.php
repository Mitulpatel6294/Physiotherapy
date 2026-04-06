@extends('layouts.app')

@php
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Gallery[] $galleries
     */
@endphp

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

                @forelse ($therapists as $therapist)
                    <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">

                        <img src="{{ asset('storage/therapist/' . $therapist->photo) }}"
                            class="w-32 h-32 mx-auto rounded-full object-cover">

                        <h3 class="mt-4 text-lg font-semibold text-blue-600">
                            {{ $therapist->name }}
                        </h3>

                        <p class="text-sm text-green-600">
                            {{ $therapist->position }}
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            {{ $therapist->description }}
                        </p>

                    </div>
                @empty
                    <p class="text-gray-500 md:col-span-3">No therapists found.</p>
                @endforelse

            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <!-- GALLERY -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Our Clinic Gallery</h2>

            <div class="grid md:grid-cols-3 gap-6 mt-10">
                @forelse ($galleries ?? [] as $gallery)
                    @if(empty($gallery->image_path))
                        @continue
                    @endif

                    @php
                        $fallbackSrc = 'https://via.placeholder.com/800x600?text=Gallery+Image';
                        $imgUrl = Str::startsWith($gallery->image_path, ['http://', 'https://'])
                            ? $gallery->image_path
                            : asset('storage/gallery/' . ltrim($gallery->image_path, '/'));
                    @endphp

                    <!-- Thumbnail -->
                    <div class="relative h-64 rounded-xl shadow cursor-pointer bg-gray-100 overflow-hidden"
                        onclick="showGalleryZoom('{{ $imgUrl }}')">

                        <img src="{{ $imgUrl }}" class="w-full h-full object-cover"
                            onerror="this.onerror=null; this.src='{{ $fallbackSrc }}';">
                    </div>

                @empty
                    <p class="text-gray-500 md:col-span-3 text-sm">No gallery images available yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- MODAL -->
    <div id="gallery-zoom-overlay" class="fixed inset-0 z-[9999] bg-black/80 hidden flex items-center justify-center p-4">

        <div class="relative w-full max-w-3xl bg-black rounded-xl flex items-center justify-center">
            <!-- Image -->
            <img id="gallery-zoom-img" src="" class="w-full max-h-[80vh] object-contain rounded-xl">
        </div>

    </div>

    <script>
        function showGalleryZoom(src) {
            const overlay = document.getElementById('gallery-zoom-overlay');
            const img = document.getElementById('gallery-zoom-img');

            img.src = src;
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
        }

        function hideGalleryZoom() {
            const overlay = document.getElementById('gallery-zoom-overlay');
            const img = document.getElementById('gallery-zoom-img');

            overlay.classList.add('hidden');
            overlay.classList.remove('flex');
            img.src = '';
        }

        // Close on background click
        document.getElementById('gallery-zoom-overlay').addEventListener('click', function (e) {
            if (e.target === this) {
                hideGalleryZoom();
            }
        });
    </script>

    <!-- STATS -->
    <section class="py-16 text-center bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-4 gap-6">
            <div>
                <h3 class="text-2xl font-bold text-blue-600">{{ $patientCount ?? 500 }}+ Patients</h3>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-blue-600">{{ $expertCount ?? 10 }}+ Experts</h3>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-blue-600">5+ Years</h3>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-blue-600">100% Care</h3>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="bg-green-50 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Patient Feedback</h2>

            <div class="grid md:grid-cols-3 gap-6 mt-10">
                @forelse ($feedbacks as $feedback)
                    <div class="bg-white p-6 rounded-xl shadow">
                        <p class="text-gray-600 text-sm">
                            “{{ $feedback->message }}”
                        </p>
                        <h4 class="mt-4 font-semibold text-green-600">{{ $feedback->name }}</h4>
                        @if ($feedback->email)
                            <p class="text-xs text-gray-400 mt-1">{{ $feedback->email }}</p>
                        @endif
                    </div>
                @empty
                    <p class="md:col-span-3 text-gray-400 text-sm">No patient feedback available yet.</p>
                @endforelse
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