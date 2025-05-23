<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session()->has('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @livewire('dealer.edit-car', ['car' => $car])

                <form method="POST" action="{{ route('dealer.cars.destroy', $car->_id) }}" 
                      class="mt-4" 
                      id="delete-car-form" 
                      onsubmit="return confirm('Are you sure you want to delete this car?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        Delete Car
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
