<?php

// app/Livewire/Profile/LogoutOtherBrowserSessionsForm.php
namespace App\Livewire\Profile;

use Livewire\Component;

class LogoutOtherBrowserSessionsForm extends Component
{
    public function logout()
    {
        auth()->logoutOtherDevices(request('password'));
        session()->flash('message', 'Logged out from other sessions.');
    }

    public function render()
    {
        return view('livewire.profile.logout-other-browser-sessions-form');
    }
}
