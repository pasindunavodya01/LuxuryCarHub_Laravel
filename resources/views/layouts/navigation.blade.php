<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-white text-2xl font-bold flex items-center">
                    <img src="{{ asset('images/Logo.jpg') }}" alt="LuxuryCarHub Logo" class="mr-8 h-10 rounded">
                </a>
                <a href="{{ route('home') }}" class="text-white text-2xl font-bold">LuxuryCarHub</a>
                <div class="ml-10 flex space-x-4 hidden md:flex">
                    <a href="{{ route('vehicles.index') }}" class="text-gray-300 hover:text-white">Vehicles</a>
                    <a href="{{ url('/#dealers') }}" class="text-gray-300 hover:text-white">Dealers</a>
                    <a href="{{ route('map') }}" class="text-gray-300 hover:text-white">Maps</a>
                    <a href="{{ route('about') }}" class="text-gray-300 hover:text-white">About Us</a>
                    <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Contact Us</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if(Auth::user()->role === 'dealer')
                                    <x-dropdown-link href="{{ route('dealer.cars.index') }}">
                                        {{ __('My Cars') }}
                                    </x-dropdown-link>
                                @endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-300 hover:text-white">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
