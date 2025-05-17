@extends('layouts.app') {{-- If you're using a layout --}}
@section('content')

<div class="max-w-4xl mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ $car['mainimage'] ?? asset('images/placeholder.jpg') }}" class="w-full h-64 object-cover" alt="Car image">

        <div class="p-6">
            <h2 class="text-3xl font-bold mb-2">{{ $car['make'] ?? '' }} {{ $car['model'] ?? '' }}</h2>
            <p class="text-gray-600 text-sm mb-4">Year: {{ $car['year'] ?? 'N/A' }} | Fuel: {{ $car['fuel'] ?? 'N/A' }}</p>

            <p class="text-gray-800 mb-4">{{ $car['description'] ?? 'No description available.' }}</p>

            <p class="text-2xl text-green-600 font-semibold mb-6">Rs.{{ number_format($car['price'] ?? 0, 2) }}</p>

            <a href="{{ route('vehicles.index') }}" class="inline-block bg-gray-800 text-white px-6 py-2 rounded-lg">← Back to Vehicles</a>
        </div>
    </div>
</div>

@endsection
