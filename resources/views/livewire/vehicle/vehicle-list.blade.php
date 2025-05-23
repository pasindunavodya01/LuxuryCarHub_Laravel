<div>
    <!-- Search -->
    <div class="bg-white py-4 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-4">
                <input 
                    type="text" 
                    wire:model.live="search"
                    placeholder="Search by make, model, or year..." 
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full">
            </div>
        </div>
    </div>

    <!-- Cars -->
    <div class="container mx-auto px-4 py-2">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Cars</h2>
        
        <div wire:loading class="text-center py-4">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
            <p class="mt-2 text-gray-600">Loading...</p>
        </div>

        @if(count($vehicles) === 0)
            <div class="text-center py-8">
                <p class="text-gray-600">No vehicles found{{ $search ? ' matching your search.' : '.' }}</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($vehicles as $car)
                    <a href="{{ route('vehicles.show', $car->_id) }}" class="block">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:shadow-xl transition-shadow">
                            <img class="w-full h-48 object-cover" 
                                src="{{ url('storage/' . $car->images) }}" 
                                alt="{{ $car->make }} {{ $car->model }}">
                            <div class="px-5 py-1">
                                <div class="font-bold text-xl mb-2">
                                    {{ $car->make }} {{ $car->model }}
                                </div>
                                <p class="text-gray-700 text-base">
                                    <strong>Year:</strong> {{ $car->year }}<br>
                                    <strong>Fuel:</strong> {{ $car->fuel }}
                                </p>
                                <p class="text-green-500 font-bold mt-4">
                                    Rs.{{ number_format($car->price, 2) }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $vehicles->links() }}
            </div>
        @endif
    </div>
</div>
