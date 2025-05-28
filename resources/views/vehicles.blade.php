 <!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Car Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100">


<!-- Navbar -->
<nav class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-white text-2xl font-bold flex items-center">
                    <img src="{{ asset('images/Logo.jpg') }}" alt="LuxuryCarHub Logo" class="mr-8 h-10 rounded">
                </a>
                <a href="{{ url('/') }}" class="text-white text-2xl font-bold">LuxuryCarHub</a>
                <div class="ml-10 space-x-4 hidden md:flex">
                    <a href="{{ url('/vehicles') }}" class="text-gray-300 hover:text-white">Vehicles</a>
                    <a href="{{ url('/#dealers') }}" class="text-gray-300 hover:text-white">Dealers</a>
                    <a href="{{ url('/map') }}" class="text-gray-300 hover:text-white">Maps</a>
                    <a href="{{ url('/about') }}" class="text-gray-300 hover:text-white">About us</a>
                    <a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white">Contact Us</a>
                </div>
            </div>                <div class="flex items-center space-x-4">
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-300 px-4 py-2 hover:text-white">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                </div>
                <!-- Hamburger Icon -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <ul class="space-y-4 text-white">
                <li><a href="{{ url('/vehicles') }}" class="block text-gray-300 hover:text-white">Vehicles</a></li>
                <li><a href="{{ url('/#dealers') }}" class="block text-gray-300 hover:text-white">Dealers</a></li>
                <li><a href="{{ url('/map') }}" class="block text-gray-300 hover:text-white">Maps</a></li>                    <li><a href="{{ url('/about') }}" class="block text-gray-300 hover:text-white">About us</a></li>
                <li><a href="{{ url('/contact') }}" class="block text-gray-300 hover:text-white">Contact Us</a></li>
                <li><a href="{{ route('login') }}" class="block text-gray-300 hover:text-white">Login</a></li>
                <li><a href="{{ route('register') }}" class="block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mt-2">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    menuToggle?.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });
</script>

<!-- Intro -->
<header class="bg-cover bg-center py-12 text-center" style="background-image: url('{{ asset('images/background.jpg') }}');">
    <h1 class="text-4xl font-bold text-gray-800 bg-white bg-opacity-75 inline-block px-4 py-1 rounded">LuxuryCarHub</h1> <br><br>
    <p class="text-gray-600 bg-white bg-opacity-75 inline-block px-3 py-1 rounded">
        Welcome! Explore a variety of cars and find the one that suits you best.
    </p>
</header>

@livewire('vehicle.vehicle-list')

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-6">
    <p>&copy; 2025 LuxuryCarHub. All Rights Reserved.</p>
    <p class="text-sm">LuxuryCarHub.com | Contact: support@luxurycarhub.com</p>
</footer>
```

    @livewireScripts
</body>
</html>
