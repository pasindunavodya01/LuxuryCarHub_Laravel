<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class UpdatePasswordForm extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updatePassword()
    {
        $user = Auth::user();

        if (!Hash::check($this->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        $user->forceFill([
            'password' => bcrypt($this->password),
        ])->save();

        session()->flash('message', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile.update-password-form');
    }
}
