<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $car->make }} {{ $car->model }} - LuxuryCarHub</title>
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
                    <a href="{{ url('/vehicles') }}" class="text-gray-300 hover:text-white">Vehicles</a>
                    <a href="{{ url('/#dealers') }}" class="text-gray-300 hover:text-white">Dealers</a>
                    <a href="{{ url('/map') }}" class="text-gray-300 hover:text-white">Maps</a>
                    <a href="{{ url('/about') }}" class="text-gray-300 hover:text-white">About Us</a>
                    <a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white">Contact Us</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex space-x-4">
                    <a href="{{ url('/login') }}" class="text-gray-300 hover:text-white ">Login</a>
                    <a href="{{ url('/register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Car Details -->
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
            <!-- Car Image -->
            <div class="md:flex-shrink-0 md:w-1/2">
                <img class="h-96 w-full object-cover md:h-full" src="{{ url('storage/' . $car->images) }}" alt="{{ $car->make }} {{ $car->model }}">
            </div>
            
            <!-- Car Information -->
            <div class="p-8 md:w-1/2">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $car->year }}</div>
                <h1 class="mt-2 text-3xl font-bold text-gray-900">{{ $car->make }} {{ $car->model }}</h1>
                
                <div class="mt-4">
                    <p class="text-4xl font-bold text-green-600">Rs. {{ number_format($car->price, 2) }}</p>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Make</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $car->make }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Model</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $car->model }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Year</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $car->year }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Fuel Type</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $car->fuel }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="mt-6">
                    <h3 class="text-lg font-medium text-gray-900">Description</h3>
                    <p class="mt-2 text-gray-600">{{ $car->description }}</p>
                </div>                <!-- Contact Dealer Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Dealer Information</h3>
                    @if($dealer)
                        <div class="mb-4">
                            <p class="text-gray-600"><strong>Dealer:</strong> {{ $dealer->name }}</p>
                        </div>
                        <a href="{{ route('dealers.show', $dealer->id) }}" 
                           class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700">
                            Contact Dealer
                        </a>
                    @else
                        <p class="text-gray-500">Dealer information not available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center py-6 mt-12">
    <p>&copy; 2025 LuxuryCarHub. All Rights Reserved.</p>
    <p class="text-sm">LuxuryCarHub.com | Contact: support@luxurycarhub.com</p>
</footer>

</body>
</html>
