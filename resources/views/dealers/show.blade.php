<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dealer->name }} - LuxuryCarHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-white text-2xl font-bold flex items-center">
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
                        <a href="{{ route('login') }}" class="text-gray-300 px-4 py-2 hover:text-white">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dealer Profile -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-start">
                <div class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center mr-6">
                    <span class="text-4xl text-white font-bold">{{ strtoupper(substr($dealer->name, 0, 1)) }}</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $dealer->name }}</h1> 
                    <p class="text-gray-600 mt-2">
                        @if($dealer->phone_number)
                            <span class="block"><strong>Phone:</strong> {{ $dealer->phone_number }}</span>
                        @endif
                        <span class="block"><strong>Email:</strong> {{ $dealer->email }}</span>
                    </p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="mt-8 max-w-lg">
                <h2 class="text-2xl font-bold mb-4">Contact Dealer</h2>
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('dealers.contact', $dealer->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required
                               class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700">Your Email</label>
                        <input type="email" name="email" id="email" required
                               class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" required
                                  class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500"></textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                        Send Message
                    </button>
                 </form>
            </div>
        </div>

        <!-- Dealer's Inventory -->
        <div>
            <h2 class="text-2xl font-bold mb-6">Available Vehicles</h2>
            @if(count($inventory) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($inventory as $car)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                            <img src="{{ url('storage/' . $car->images) }}" 
                                 alt="{{ $car->make }} {{ $car->model }}"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold">{{ $car->make }} {{ $car->model }}</h3>
                                <p class="text-gray-600">Year: {{ $car->year }}</p>
                                <p class="text-gray-600">Fuel: {{ $car->fuel }}</p>
                                <p class="text-green-600 font-bold mt-2">Rs. {{ number_format($car->price, 2) }}</p>
                                <a href="{{ route('vehicles.show', $car->_id) }}" 
                                   class="mt-4 inline-block text-blue-600 hover:text-blue-800">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No vehicles currently available from this dealer.</p>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>&copy; 2025 LuxuryCarHub. All Rights Reserved.</p>
        <p class="text-sm">LuxuryCarHub.com | Contact: support@luxurycarhub.com</p>
    </footer>

</body>
</html>
