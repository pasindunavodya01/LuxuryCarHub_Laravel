<!-- resources/views/livewire/profile/logout-other-browser-sessions-form.blade.php -->
<form wire:submit.prevent="logout">
    <input type="password" wire:model.defer="password" placeholder="Enter current password" />
    <button type="submit" class="btn">Logout other sessions</button>

    @if (session()->has('message'))
        <p class="text-green-500">{{ session('message') }}</p>
    @endif
</form>
