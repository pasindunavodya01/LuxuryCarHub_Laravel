@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Car</h1>

    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @livewire('dealer.edit-car', ['car' => $car])
      <form method="POST" action="{{ route('dealer.cars.destroy', $car->_id) }}" class="mt-4" id="delete-car-form" onsubmit="return confirm('Are you sure you want to delete this car?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete Car</button>
    </form>
</div>
@endsection
