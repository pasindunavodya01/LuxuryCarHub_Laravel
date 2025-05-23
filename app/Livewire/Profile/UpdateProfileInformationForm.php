<?php
namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateProfileInformationForm extends Component
{
    public $state = [];

    public function mount()
    {
        $this->state = Auth::user()->only(['name', 'email', 'phone_number']);
    }

    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        $user = Auth::user();

        $updater->update($user, $this->state);

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }
}


