<?php

namespace App\Livewire\Dealer;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddCar extends Component
{
    use WithFileUploads;

    public $make, $model, $year, $fuel, $price, $description, $image;

    protected $rules = [
        'make' => 'required|string|max:100',
        'model' => 'required|string|max:100',
        'year' => 'required|integer',
        'fuel' => 'nullable|string',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ];

    

    public function addCar()
{
    $this->validate();

    $car = new Car();
    $car->make = $this->make;
    $car->model = $this->model;
    $car->year = $this->year;
    $car->fuel = $this->fuel;
    $car->price = $this->price;
    $car->description = $this->description;
    $car->dealer_id = Auth::id(); // assuming the dealer is logged in

    // Handle the image upload
    if ($this->image) {
        // Store the image and get the file path
        $imagePath = $this->image->store('cars', 'public');
        $car->images = $imagePath; // Save the image path to the 'images' column
    }

    // Save the car to the database
    $car->save();

    // Flash success message and redirect
    session()->flash('success', 'Car added successfully! - livewire');
     $this->reset(['make', 'model', 'year', 'fuel', 'price', 'description', 'image']);
    // return redirect()->route('dealer.cars.index');
    
}


}
