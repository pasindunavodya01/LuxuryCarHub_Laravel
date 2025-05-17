<div class="container mx-auto px-4 py-10">
    
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Dealer Dashboard</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Add New Car</h2>

        <form wire:submit.prevent="addCar" enctype="multipart/form-data">
            @csrf

            <div class="flex space-x-4 mb-4">
                <div class="flex-1">
                    <label for="make" class="block text-gray-700">Make</label>
                    <input type="text" wire:model="make" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter Car Make" required>
                    @error('make') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1">
                    <label for="model" class="block text-gray-700">Model</label>
                    <input type="text" wire:model="model" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter Car Model" required>
                    @error('model') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex space-x-4 mb-4">
                <div class="flex-1">
                    <label for="year" class="block text-gray-700">Year</label>
                    <input type="number" wire:model="year" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter Year" required>
                    @error('year') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1">
                    <label for="fuel" class="block text-gray-700">Fuel Type</label>
                    <input type="text" wire:model="fuel" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter Fuel Type">
                </div>
            </div>

            <div class="flex space-x-4 mb-4">
                <div class="flex-1">
                    <label for="price" class="block text-gray-700">Price ($)</label>
                    <input type="number" step="0.01" wire:model="price" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter Price" required>
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <input type="text" wire:model="description" class="w-full p-6 border border-gray-300 rounded-md" placeholder="Enter Description">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Car Image</label>
                <input type="file" wire:model="image" class="w-full p-3 border border-gray-300 rounded-md">
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

                 @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
                <a href="{{ route('dealer.cars.index') }}" class="ml-4 underline text-blue-600"> <br> Go back to car list</a>
            </div>
        @endif

            <div class="mt-6">
                <button type="submit" class="w-full bg-gray-800 text-white py-3 rounded-md hover:bg-gray-700">Submit</button>
            </div>
        </form>
    </div>
</div>
