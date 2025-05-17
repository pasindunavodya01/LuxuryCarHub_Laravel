@extends('layouts.app')
@section('content')

<div class="max-w-6xl mx-auto px-4 py-6 space-y-8">

    <!-- Dealer Info -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-2">{{ $dealer['name'] ?? 'Unnamed Dealer' }}</h2>
        <p class="text-gray-600">Location: {{ $dealer['location'] ?? 'N/A' }}</p>
        <p class="text-gray-600">Email: {{ $dealer['email'] ?? 'N/A' }}</p>
    </div>

    <!-- Inventory -->
    <div>
        <h3 class="text-2xl font-bold mb-4">Inventory</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($inventory as $car)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="{{ $car['mainimage'] ?? asset('images/placeholder.jpg') }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg">{{ $car['make'] }} {{ $car['model'] }}</h4>
                        <p class="text-gray-600">Year: {{ $car['year'] }}, Fuel: {{ $car['fuel'] }}</p>
                        <p class="text-green-600 font-bold mt-2">Rs.{{ number_format($car['price'], 2) }}</p>
                        <a href="{{ route('vehicles.show', $car['_id']) }}" class="text-blue-500 hover:underline">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Contact Form -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-2xl font-bold mb-4">Contact Dealer</h3>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dealers.contact', $dealer['_id']) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block">Name</label>
                <input type="text" name="name" class="w-full border px-4 py-2 rounded" required>
            </div>
            <div>
                <label class="block">Email</label>
                <input type="email" name="email" class="w-full border px-4 py-2 rounded" required>
            </div>
            <div>
                <label class="block">Message</label>
                <textarea name="message" rows="5" class="w-full border px-4 py-2 rounded" required></textarea>
            </div>
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded">Send Message</button>
        </form>
    </div>

</div>

@endsection
