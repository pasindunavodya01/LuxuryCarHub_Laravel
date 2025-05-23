<?php

namespace App\Livewire\Vehicle;

use Livewire\Component;
use App\Models\Car;
use Livewire\WithPagination;

class VehicleList extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $vehicles = Car::when($this->search, function($query) {
            $query->where(function($q) {
                $q->where('make', 'like', '%' . $this->search . '%')
                  ->orWhere('model', 'like', '%' . $this->search . '%')
                  ->orWhere('year', 'like', '%' . $this->search . '%');
            });
        })->paginate(12);

        return view('livewire.vehicle.vehicle-list', [
            'vehicles' => $vehicles
        ]);
    }
}
