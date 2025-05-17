<div class="container mx-auto px-4 ">


    <form wire:submit.prevent="updateCar" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Make</label>
                <input type="text" wire:model="make" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-gray-700">Model</label>
                <input type="text" wire:model="model" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-gray-700">Year</label>
                <input type="number" wire:model="year" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-gray-700">Fuel</label>
                <input type="text" wire:model="fuel" class="w-full p-3 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700">Price</label>
                <input type="number" wire:model="price" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700">Description</label>
            <textarea wire:model="description" class="w-full p-3 border border-gray-300 rounded-md"></textarea>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700">Upload New Image (optional)</label>
            <input type="file" wire:model="image" class="w-full p-3 border border-gray-300 rounded-md">
        </div>
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
                <a href="{{ route('dealer.cars.index') }}" class="ml-4 underline text-blue-600"> <br> Go back to car list</a>
            </div>
        @endif

        @if ($existingImage)
            <div class="mt-4">
                <p class="text-sm text-gray-600">Current Image:</p>
                <img src="{{ url('storage/' . $existingImage) }}" class="w-48 h-32 object-cover mt-2 rounded">
            </div>
        @endif

        <div class="mt-6 flex gap-4 items-center">
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-600">Update Car</button>
            <a href="{{ route('dealer.cars.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
