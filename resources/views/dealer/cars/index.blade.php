@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 id="myads" class="text-2xl font-bold text-gray-800 mb-4">My Ads</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('dealer.cars.create') }}" class="bg-blue-600 hover:bg-green-600 text-black font-semibold px-6 py-2 rounded-full transition duration-200 inline-block mb-6">
        + Add New Car
    </a>

    @if($cars->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($cars as $car)
                <a href="{{ route('dealer.cars.edit', $car->_id) }}" class="bg-white rounded-lg shadow hover:bg-gray-100 transition duration-200 overflow-hidden max-w-xs w-full">
                    @if($car->images)
                        <img src="{{ url('storage/' . $car->images) }}" alt="Car Image" class="w-full h-48 object-cover mb-4">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 mb-4">No Image</div>
                    @endif

                    <div class="px-4 pb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $car->make }} {{ $car->model }}</h3>
                        <p class="text-sm text-gray-600 mb-1 line-clamp-2">{{ $car->description }}</p>
                        <p class="text-sm text-gray-500"><strong>Year:</strong> {{ $car->year }}</p>
                        <p class="text-sm text-gray-500"><strong>Fuel:</strong> {{ $car->fuel ?? 'Not specified' }}</p>
                        <p class="text-sm text-gray-500"><strong>Price:</strong> ${{ number_format($car->price, 2) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-700">You haven't listed any cars yet.</p>
    @endif
</div>
@endsection
