<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\Car;

class FeaturedCars extends Component
{
    public function render()
    {
        $cars = Car::take(4)->get();
        return view('livewire.home.featured-cars', [
            'cars' => $cars
        ]);
    }
}
