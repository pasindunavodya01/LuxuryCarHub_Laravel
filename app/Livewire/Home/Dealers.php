<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class Dealers extends Component
{
    public function render()
    {
        $dealers = User::where('role', 'dealer')->get();
        return view('livewire.home.dealers', [
            'dealers' => $dealers
        ]);
    }
}
