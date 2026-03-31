@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="bg-blue-50 py-20">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
        
        <div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">
                Pain-Free Living Starts at 
                <span class="text-blue-600">PhysioSync</span>
            </h1>
            <p class="mt-4 text-gray-600">
                Expert physiotherapy for faster recovery, better mobility, and long-term relief.
            </p>

            <div class="mt-6 flex gap-4">
                <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700">
                    Book Appointment
                </a>
                <a href="#" class="border border-blue-600 text-blue-600 px-6 py-3 rounded-lg">
                    Call Now
                </a>
            </div>
        </div>

        <div>
            <img src="https://via.placeholder.com/500x350" class="rounded-xl shadow-md">
        </div>

    </div>
</section>

<!-- PAIN AREAS -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">What Pain Are You Facing?</h2>

        <div class="grid md:grid-cols-3 gap-6 mt-10">
            
            @foreach(['Back Pain','Neck Pain','Knee Pain','Shoulder Pain','Foot Pain','Wrist Pain'] as $pain)
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md cursor-pointer">
                <h3 class="text-lg font-semibold text-blue-600">{{ $pain }}</h3>
                <p class="text-sm text-gray-500 mt-2">
                    Click to explore treatment options
                </p>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="bg-green-50 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Why Choose PhysioSync?</h2>

        <div class="grid md:grid-cols-4 gap-6 mt-10">

            @foreach([
                'Expert Therapists',
                'Modern Techniques',
                'Personalized Care',
                'Fast Recovery Focus'
            ] as $item)

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

<!-- SERVICES PREVIEW -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Our Services</h2>

        <div class="grid md:grid-cols-3 gap-6 mt-10">
            
            @for($i=0; $i<3; $i++)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="https://via.placeholder.com/300x200" class="rounded-lg">
                <h3 class="mt-4 font-semibold text-blue-600">Physiotherapy Treatment</h3>
                <p class="text-sm text-gray-500 mt-2">
                    Advanced therapy techniques for pain relief.
                </p>
            </div>
            @endfor

        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="bg-blue-50 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Patient Testimonials</h2>

        <div class="grid md:grid-cols-3 gap-6 mt-10">

            @for($i=0; $i<3; $i++)
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-600 text-sm">
                    “Great experience. Pain reduced significantly after sessions.”
                </p>
                <h4 class="mt-4 font-semibold text-blue-600">Patient Name</h4>
            </div>
            @endfor

        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 text-center">
    <h2 class="text-3xl font-semibold text-gray-800">
        Still in Pain? Start Your Recovery Today.
    </h2>
    <a href="#" class="mt-6 inline-block bg-green-600 text-white px-8 py-3 rounded-lg shadow hover:bg-green-700">
        Book Appointment
    </a>
</section>

<!-- LOCATION -->
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold text-gray-800">Visit Our Clinic</h2>

        <div class="mt-8">
            <iframe 
                class="w-full h-80 rounded-xl shadow"
                src="https://maps.google.com/maps?q=surat&t=&z=13&ie=UTF8&iwloc=&output=embed">
            </iframe>
        </div>
    </div>
</section>

<!-- CONTACT FORM -->
<section class="bg-blue-600 py-16">
    <div class="max-w-5xl mx-auto px-6 text-white text-center">
        <h2 class="text-3xl font-semibold">Book an Appointment</h2>

        <form class="grid md:grid-cols-2 gap-4 mt-8">
            <input type="text" placeholder="Full Name" class="p-3 rounded text-black">
            <input type="text" placeholder="Phone Number" class="p-3 rounded text-black">
            <input type="text" placeholder="Preferred Date" class="p-3 rounded text-black">
            <input type="text" placeholder="Pain Area" class="p-3 rounded text-black">

            <textarea placeholder="Message" class="p-3 rounded text-black md:col-span-2"></textarea>

            <button class="bg-green-500 py-3 rounded shadow md:col-span-2">
                Book Now
            </button>
        </form>
    </div>
</section>
<div class="bg-blue-100 py-16">
    
    <div class="max-w-3xl mx-auto bg-blue-300 rounded-xl shadow p-8">
        
        <h2 class="text-3xl font-semibold text-center">Book an Appointment</h2>

        <form class="grid md:grid-cols-2 gap-4 mt-8">
            <input type="text" placeholder="Full Name" class="p-3 rounded border text-black">
            <input type="text" placeholder="Phone Number" class="p-3 rounded border text-black">
            <input type="text" placeholder="Preferred Date" class="p-3 rounded border text-black">
            <input type="text" placeholder="Pain Area" class="p-3 rounded border text-black">

            <textarea placeholder="Message" class="p-3 rounded border text-black md:col-span-2"></textarea>

            <button class="bg-green-500 text-white py-3 rounded shadow md:col-span-2 hover:bg-green-600">
                Book Now
            </button>
        </form>

    </div>

</div>
@endsection