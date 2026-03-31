<nav class="bg-white shadow-md border-b sticky top-0 z-50 w-full">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <a href="/" class="text-2xl font-bold text-blue-600">
            PhysioSync
        </a>

        <!-- DESKTOP MENU -->
        <div class="md:flex items-center space-x-8 text-yellow-700 font-medium">

            <a href="{{ route('home') }}"
                class="pb-1 border-b-2 {{ request()->routeIs('home') ? 'border-blue-600 text-blue-600' : 'border-transparent hover:text-blue-600' }}">
                Home
            </a>

            <a href="{{ route('service') }}"
                class="pb-1 border-b-2 {{ request()->routeIs('service') ? 'border-blue-600 text-blue-600' : 'border-transparent hover:text-blue-600' }}">
                Services
            </a>

            <a href="{{ route('about_us') }}"
                class="pb-1 border-b-2 {{ request()->routeIs('about_us') ? 'border-blue-600 text-blue-600' : 'border-transparent hover:text-blue-600' }}">
                About
            </a>

            <a href="{{ route('contact') }}"
                class="pb-1 border-b-2 {{ request()->routeIs('contact') ? 'border-blue-600 text-blue-600' : 'border-transparent hover:text-blue-600' }}">
                Contact
            </a>

        </div>

        <!-- RIGHT SIDE -->
        <div class="md:flex items-center space-x-4">
            <a href="{{ url('/#appointment') }}"
                class="text-blue-600 px-3 py-2 rounded-lg hover:bg-blue-600 hover:text-white">
                Book Appointment
            </a>

            @auth
                <a href="{{ route('profile.edit') }}"
                    class="text-grey-600 px-3 py-2 rounded-lg hover:bg-green-600 hover:text-white">
                    {{ Auth::user()->name }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600 px-3 py-2 rounded-lg hover:bg-red-600 hover:text-white">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="text-blue-600 px-3 py-2 rounded-lg hover:bg-blue-600 hover:text-white">
                    Login
                </a>

                <a href="{{ route('register') }}"
                    class="text-blue-600 px-3 py-2 rounded-lg hover:bg-blue-600 hover:text-white">
                    Register
                </a>
            @endauth
        </div>

    </div>
</nav>
