<?php
// app/Livewire/Profile/DeleteUserForm.php
namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DeleteUserForm extends Component
{
    public $password;

    public function deleteUser()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.profile.delete-user-form');
    }
}
