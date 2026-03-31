<footer class="bg-gray-900 text-gray-300 mt-16">

    <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-4 gap-10">

        <!-- BRAND -->
        <div>
            <h2 class="text-2xl font-bold text-white">PhysioSync</h2>
            <p class="text-sm mt-3 text-gray-400">
                Pain relief & physiotherapy services focused on faster recovery and better mobility.
            </p>
        </div>

        <!-- QUICK LINKS -->
        <div>
            <h3 class="font-semibold mb-4 text-white">Quick Links</h3>
            <ul class="space-y-2 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-blue-400">Home</a>
                </li>
                <li>
                    <a href="{{ route('about_us') }}" class="hover:text-blue-400">About</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="hover:text-blue-400">Contact</a>
                </li>
                <li>
                    <a href="{{ url('/#appointment') }}" class="hover:text-blue-400">
                        Book Appointment
                    </a>
                </li>
            </ul>
        </div>

        <!-- SERVICES -->
        <div>
            <h3 class="font-semibold mb-4 text-white">Services</h3>
            <ul class="space-y-2 text-sm text-gray-400">
                <li>Pain Management</li>
                <li>Sports Injury Rehab</li>
                <li>Post Surgery Rehab</li>
                <li>Posture Correction</li>
            </ul>
        </div>

        <!-- CONTACT -->
        <div>
            <h3 class="font-semibold mb-4 text-white">Contact</h3>
            <p class="text-sm text-gray-400">info@email.com</p>
            <p class="text-sm mt-2 text-gray-400">+91 12345 67890</p>
        </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="border-t border-gray-800 text-center text-sm py-4 text-gray-500">
        © {{ date('Y') }} PhysioSync. All rights reserved.
    </div>

</footer>
