@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, {{ Auth::user()->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-2">My Profile</h2>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-2">Saved Vehicles</h2>
                <p>View your favorite cars and manage your wishlist.</p>
                <a href="#" class="text-blue-600 font-bold hover:underline mt-2 inline-block">Go to Wishlist</a>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-2">Messages</h2>
                <p>View your inquiries and dealer responses.</p>
                <a href="#" class="text-blue-600 font-bold hover:underline mt-2 inline-block">View Messages</a>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-2">Browse Vehicles</h2>
                <p>Start exploring available cars.</p>
                <a href="{{ url('/vehicles') }}" class="text-blue-600 font-bold hover:underline mt-2 inline-block">Browse Now</a>
            </div>
        </div>
    </div>
@endsection
