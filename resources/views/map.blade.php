<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps - Luxury Car Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-white text-2xl font-bold flex items-center">
                        <img src="{{ asset('images/Logo.jpg') }}" alt="LuxuryCarHub Logo" class="mr-8 h-10 rounded">
                    </a>
                    <a href="{{ url('/') }}" class="text-white text-2xl font-bold">LuxuryCarHub</a>
                    <div class="ml-10 flex space-x-4 hidden md:flex">
                        <a href="{{ url('/vehicles') }}" class="text-gray-300 hover:text-white">Vehicles</a>
                        <a href="{{ url('/#dealers') }}" class="text-gray-300 hover:text-white">Dealers</a>
                        <a href="{{ url('/map') }}" class="text-gray-300 hover:text-white">Maps</a>
                        <a href="{{ url('/about') }}" class="text-gray-300 hover:text-white">About Us</a>
                        <a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white">Contact Us</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-gray-300 hover:text-white px-4 py-2">Login</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                  </div>
            </div>
        </div>
    </nav>

    <!-- Page Title -->
    <h1 class="text-4xl font-bold text-gray-800 text-center my-8">Our Dealers Locations</h1>

    <!-- Map Container -->
    <div class="container mx-auto px-4 py-4">
        <div id="map" style="height: 500px;" class="rounded shadow"></div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize map
        const map = L.map('map').setView([7.8731, 80.7718], 7);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Pass dealer data from PHP to JavaScript
        const dealers = @json($dealers);

        // Add markers for each dealer
        dealers.forEach(dealer => {
            if (dealer.latitude && dealer.longitude) {
                L.marker([dealer.latitude, dealer.longitude])
                    .addTo(map)
                    .bindPopup(`<strong>${dealer.name}</strong><br>${dealer.email}`);
            }
        });
    </script>

</body>
</html>
