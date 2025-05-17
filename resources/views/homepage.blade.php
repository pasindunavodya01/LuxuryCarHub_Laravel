<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxuryCarHub - Find Your Dream Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <div class="ml-10 flex space-x-4 hidden md:flex">
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
<section class="py-10 bg-gray-50">
    <div class="max-w-8xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-5">Vehicles</h2>
        <p class="text-lg text-gray-700 mb-6">At LuxuryCarHub, we feature a wide range of vehicles, from model sports cars to spacious SUVs, all carefully inspected to meet the highest standards.</p>

        @if(count($cars) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($cars as $car)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <img src="{{ url('storage/' . $car->images) }}" alt="{{ $car['make'] ?? '' }} {{ $car['model'] ?? '' }}" class="w-full h-64 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $car['make'] ?? '' }} {{ $car['model'] ?? '' }}</h3>
                        <p class="text-lg text-gray-700"><strong>Price:</strong> Rs.{{ number_format($car['price'] ?? 0, 2) }}</p>
                        <a href="{{ route('vehicles.show', $car->_id) }}" class="text-blue-600 mt-4 inline-block">View Details</a>
                    </div>
                @endforeach
            </div>
            <a href="/vehicles" class="bg-blue-600 text-white px-6 py-2 rounded-lg mt-6 inline-block">Show More Vehicles</a>
        @else
            <p class="text-gray-500 mt-6">No vehicles found.</p>
        @endif
    </div>
</section>

<!-- Dealers -->
<section id="dealers" class="py-10 bg-white">
    <div class="max-w-8xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Our Dealers</h2>
        <p class="text-lg text-gray-700 mb-6">Our network of verified dealers is at the heart of LuxuryCarHub. We partner with reputable sellers who share our commitment to excellence, ensuring that every transaction is secure and transparent.</p>

        @if(isset($dealers) && count($dealers) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mt-8">
                @foreach($dealers as $dealer)
                    <div class="bg-gray-50 rounded-lg p-6 shadow-md transition-transform hover:scale-105">
                        <div class="w-24 h-24 mx-auto bg-blue-600 rounded-full flex items-center justify-center mb-4">
                            <span class="text-3xl text-white font-bold">{{ strtoupper(substr($dealer->name, 0, 1)) }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $dealer->name }}</h3>
                        @if($dealer->phone_number)
                            <p class="text-gray-600 mb-2">
                                <span class="font-medium">Phone:</span> {{ $dealer->phone_number }}
                            </p>
                        @endif
                        <p class="text-gray-600 mb-4">
                            <span class="font-medium">Email:</span> {{ $dealer->email }}
                        </p>
                        <a href="/dealer/{{ $dealer->id }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            View Inventory
                        </a>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 mt-6">No dealers available at the moment.</p>
        @endif
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-6">
    <p>&copy; 2025 LuxuryCarHub. All Rights Reserved.</p>
    <p class="text-sm">LuxuryCarHub.com | Contact: support@luxurycarhub.com</p>
</footer>

</body>
</html>
