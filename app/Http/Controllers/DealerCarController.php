<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class DealerCarController extends Controller
{
    /**
     * Display a listing of the dealer's cars.
     */
    public function index(): View
    {
        $cars = Car::where('dealer_id', Auth::id())->get();
        return view('dealer.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new car.
     */
    public function create(): View
    {
        return view('dealer.cars.create');
    }

    /**
     * Store a newly created car.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'fuel' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('car_images', 'public');
        }

        Car::create([
            'dealer_id' => Auth::id(),
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'description' => $request->description,
            'fuel' => $request->fuel,
            'images' => $imagePath,
        ]);

        return redirect()->route('dealer.cars.index')->with('success', 'Car added successfully!');
    }

    /**
     * Remove the specified car.
     */
    public function destroy(string $id): RedirectResponse
    {
        // Find the car and check if it belongs to the authenticated dealer
        $car = Car::where('dealer_id', Auth::id())->find($id);
        
        if (!$car) {
            return redirect()->route('dealer.cars.index')
                ->with('error', 'Car not found or you do not have permission to delete it.');
        }

        // Delete the image if it exists
        if ($car->images && Storage::exists('public/' . $car->images)) {
            Storage::delete('public/' . $car->images);
        }

        // Delete the car
        $car->delete();

        return redirect()->route('dealer.cars.index')
            ->with('success', 'Car has been successfully deleted.');
    }

    public function edit($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('dealer.cars.index')->with('error', 'Car not found.');
        }

        return view('dealer.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('dealer.cars.index')->with('error', 'Car not found.');
        }

        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|numeric',
            'fuel' => 'nullable|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $car->make = $request->make;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->fuel = $request->fuel;
        $car->price = $request->price;
        $car->description = $request->description;

        if ($request->hasFile('image')) {
            if ($car->images && Storage::exists($car->images)) {
                Storage::delete($car->images);
            }

            $path = $request->file('image')->store('cars', 'public');
            $car->images = $path;
        }

        $car->save();

        return redirect()->route('dealer.cars.index')->with('success', 'Car updated successfully.');
    }
}


