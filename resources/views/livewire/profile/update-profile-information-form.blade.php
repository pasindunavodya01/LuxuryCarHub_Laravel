<form wire:submit.prevent="updateProfileInformation" class="space-y-6">
    <div>
        <label for="name">Name</label>
        <input id="name" wire:model.defer="state.name" type="text" class="mt-1 block w-full" />
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" wire:model.defer="state.email" type="email" class="mt-1 block w-full" />
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    @if (session()->has('message'))
        <p class="text-green-500">{{ session('message') }}</p>
    @endif
</form>
