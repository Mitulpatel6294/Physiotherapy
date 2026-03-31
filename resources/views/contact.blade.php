@extends('layouts.app')

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
                <p class="mt-2 text-gray-600">+91 1234567890</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold text-green-600">Email</h3>
                <p class="mt-2 text-gray-600">support@physiosync.com</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold text-blue-600">Location</h3>
                <p class="mt-2 text-gray-600">Surat, Gujarat</p>
            </div>

        </div>
    </section>

    <!-- CONTACT FORM -->
    <section class="bg-blue-100 py-16">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">

            <h2 class="text-2xl font-semibold text-center text-gray-800">Send a Message</h2>

            <form class="grid md:grid-cols-2 gap-4 mt-6">

                <input type="text" placeholder="Full Name" class="p-3 border rounded">
                <input type="text" placeholder="Phone Number" class="p-3 border rounded">

                <input type="email" placeholder="Email" class="p-3 border rounded">

                <select class="p-3 border rounded">
                    <option>Feedback</option>
                    <option>Question</option>
                </select>

                <textarea placeholder="Your Message" class="p-3 border rounded md:col-span-2"></textarea>

                <button class="bg-green-600 text-white py-3 rounded md:col-span-2 hover:bg-green-700">
                    Submit
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
                    src="https://maps.google.com/maps?q=surat&t=&z=13&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>
        </div>
    </section>

    <!-- QUICK ACTIONS -->
    <section class="bg-green-50 py-16 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Quick Actions</h2>

        <div class="mt-6 flex justify-center gap-4 flex-wrap">
            <a href="tel:+911234567890" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
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

                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-blue-600">Where is your clinic located?</h3>
                    <p class="text-gray-600 text-sm mt-2">
                        We are based in Surat, Gujarat.
                    </p>
                </div>

            </div>
        </div>
    </section>
@endsection
