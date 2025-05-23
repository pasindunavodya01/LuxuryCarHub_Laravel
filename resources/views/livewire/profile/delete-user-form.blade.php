<!-- resources/views/livewire/profile/delete-user-form.blade.php -->
<form wire:submit.prevent="deleteUser">
    <input type="password" wire:model.defer="password" placeholder="Confirm your password" />
    <button type="submit" class="btn bg-red-600 text-white">Delete Account</button>
</form>
