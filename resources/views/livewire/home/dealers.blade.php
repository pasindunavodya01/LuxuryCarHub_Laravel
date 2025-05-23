<section id="dealers" class="py-10 bg-white">
    <div class="max-w-8xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Our Dealers</h2>
        <p class="text-lg text-gray-700 mb-6">Our network of verified dealers is at the heart of LuxuryCarHub. We partner with reputable sellers who share our commitment to excellence, ensuring that every transaction is secure and transparent.</p>

        <div wire:loading class="text-center py-4">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
            <p class="mt-2 text-gray-600">Loading...</p>
        </div>

        @if(isset($dealers) && count($dealers) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mt-8">
                @foreach($dealers as $dealer)
                    <div class="bg-gray-50 rounded-lg p-6 shadow-md transition-transform hover:scale-105">
                        <div class="w-24 h-24 mx-auto bg-blue-600 rounded-full flex items-center justify-center mb-4">
                            <span class="text-3xl text-white font-bold">{{ strtoupper(substr($dealer->name, 0, 1)) }}</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $dealer->name }}</h3>
                        @if($dealer->phone_number)
                            <p class="text-gray-600 mb-2">
                                <span class="font-medium">Phone:</span> {{ $dealer->phone_number }}
                            </p>
                        @endif
                        <p class="text-gray-600 mb-4">
                            <span class="font-medium">Email:</span> {{ $dealer->email }}
                        </p>
                        <a href="/dealer/{{ $dealer->id }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            View Inventory
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 mt-6">No dealers available at the moment.</p>
        @endif
    </div>
</section>
