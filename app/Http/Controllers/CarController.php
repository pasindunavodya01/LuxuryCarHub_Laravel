<?php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Display list of cars
    public function index()
    {
        $cars = Car::all(); // Get all cars for the dealer
        return view('dealer.cars.index', compact('cars'));
    }

    // Show the form to create a new car
    public function create()
    {
        return view('dealer.cars.create');
    }

    // Store the new car
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        $car = new Car();
        $car->make = $request->make;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->price = $request->price;
        $car->description = $request->description;

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('car_images', 'public');
        }

        $car->save();

        return redirect()->route('dealer.cars.index')->with('success', 'Car added successfully.');
    }

    // Show the form to edit a car
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('dealer.cars.edit', compact('car'));
    }

    // Update the car in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        $car = Car::findOrFail($id);
        $car->make = $request->make;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->price = $request->price;
        $car->description = $request->description;

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('car_images', 'public');
        }

        $car->save();

        return redirect()->route('dealer.cars.index')->with('success', 'Car updated successfully.');
    }

    // Delete the car
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('dealer.cars.index')->with('success', 'Car deleted successfully.');
    }
}
