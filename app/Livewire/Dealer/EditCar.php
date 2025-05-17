<?php

namespace App\Livewire\Dealer;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class EditCar extends Component
{
    use WithFileUploads;

    public $carId, $make, $model, $year, $fuel, $price, $description, $image, $existingImage;

    public function mount($car)
    {
        $this->carId = $car->_id;
        $this->make = $car->make;
        $this->model = $car->model;
        $this->year = $car->year;
        $this->fuel = $car->fuel;
        $this->price = $car->price;
        $this->description = $car->description;
        $this->existingImage = $car->images;
    }

    protected $rules = [
        'make' => 'required|string|max:100',
        'model' => 'required|string|max:100',
        'year' => 'required|integer',
        'fuel' => 'nullable|string',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ];

   public function updateCar()
{
    $this->validate();

    $car = Car::find($this->carId);

    $car->update([
        'make' => $this->make,
        'model' => $this->model,
        'year' => $this->year,
        'fuel' => $this->fuel,
        'price' => $this->price,
        'description' => $this->description,
    ]);

    if ($this->image) {
        $car->images = $this->image->store('cars', 'public');
        $car->save();
    }

     session()->flash('success', 'Car updated successfully!');
}


    public function render()
    {
        return view('livewire.dealer.edit-car');
    }
}
