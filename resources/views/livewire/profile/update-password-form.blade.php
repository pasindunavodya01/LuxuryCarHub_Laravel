<form wire:submit.prevent="updatePassword" class="space-y-6">
    <div>
        <label for="current_password">Current Password</label>
        <input wire:model.defer="current_password" id="current_password" type="password" class="mt-1 block w-full" />
    </div>

    <div>
        <label for="password">New Password</label>
        <input wire:model.defer="password" id="password" type="password" class="mt-1 block w-full" />
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input wire:model.defer="password_confirmation" id="password_confirmation" type="password" class="mt-1 block w-full" />
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Update Password</button>
    </div>

    @if (session()->has('message'))
        <p class="text-green-500">{{ session('message') }}</p>
    @endif
</form>
