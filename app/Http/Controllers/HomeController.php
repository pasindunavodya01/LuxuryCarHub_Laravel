<?php

//

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{    public function index()
    {
       try {
    $cars = Car::take(8)->get(); // or Car::limit(8)->get();
    $dealers = \App\Models\User::where('role', 'dealer')->get();

    return view('homepage', compact('cars', 'dealers'));
} catch (\Exception $e) {
    \Log::error('Error loading data: ' . $e->getMessage());

    return view('homepage', [
        'cars' => [],
        'dealers' => [],
        'error' => 'Unable to load data. Please try again later.'
    ]);
}

    }
}


