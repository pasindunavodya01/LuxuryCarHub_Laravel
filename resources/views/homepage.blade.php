<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxuryCarHub - Find Your Dream Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-white text-2xl font-bold flex items-center">
                    <img src="{{ asset('images/Logo.jpg') }}" alt="Logo" class="mr-3 h-10 rounded">
                    LuxuryCarHub
                </a>
                <div class="ml-10 space-x-4 hidden md:flex">
                    <a href="/vehicles" class="text-gray-300 hover:text-white">Vehicles</a>
                    <a href="#dealers" class="text-gray-300 hover:text-white">Dealers</a>
                    <a href="/map" class="text-gray-300 hover:text-white">Maps</a>
                    <a href="/about" class="text-gray-300 hover:text-white">About Us</a>
                    <a href="/contact" class="text-gray-300 hover:text-white">Contact Us</a>
                </div>
            </div>            <div class="flex items-center space-x-4">
                <div class="hidden md:flex space-x-4">
                    <a href="/login" class="text-gray-300 hover:text-white px-4 py-2">Login</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-300 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <ul class="space-y-4 text-white">
                <li><a href="/vehicles" class="block text-gray-300 hover:text-white">Vehicles</a></li>
                <li><a href="#dealers" class="block text-gray-300 hover:text-white">Dealers</a></li>
                <li><a href="/map" class="block text-gray-300 hover:text-white">Maps</a></li>                <li><a href="/about" class="block text-gray-300 hover:text-white">About Us</a></li>
                <li><a href="/contact" class="block text-gray-300 hover:text-white">Contact Us</a></li>
                <li><a href="/login" class="block text-gray-300 hover:text-white">Login</a></li>
                <li><a href="/register" class="block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mt-2">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

<!-- Banner -->
<section class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/BYD-Song-L-traseira.webp') }}');">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center">
        <h1 class="text-4xl font-semibold">Find your dream car today!</h1>
    </div>
</section>

<!-- Vehicles -->
@livewire('home.featured-cars')

<!-- Dealers -->
@livewire('home.dealers')

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-6">
    <p>&copy; 2025 LuxuryCarHub. All Rights Reserved.</p>
    <p class="text-sm">LuxuryCarHub.com | Contact: support@luxurycarhub.com</p>
</footer>

@livewireScripts
</body>
</html>
