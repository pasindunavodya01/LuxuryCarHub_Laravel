<section class="py-10 bg-gray-50">
    <div class="max-w-8xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-5">Vehicles</h2>
        <p class="text-lg text-gray-700 mb-6">At LuxuryCarHub, we feature a wide range of vehicles, from model sports cars to spacious SUVs, all carefully inspected to meet the highest standards.</p>

        <div wire:loading class="text-center py-4">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
            <p class="mt-2 text-gray-600">Loading...</p>
        </div>

        @if(count($cars) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($cars as $car)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <img src="{{ url('storage/' . $car->images) }}" alt="{{ $car->make }} {{ $car->model }}" class="w-full h-64 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $car->make }} {{ $car->model }}</h3>
                        <p class="text-lg text-gray-700"><strong>Price:</strong> Rs.{{ number_format($car->price, 2) }}</p>
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
