<div class="flex justify-center items-center min-h-screen">
    <form wire:submit.prevent="submit" class="w-full max-w-md bg-white p-6 rounded shadow">
        <div>
            {{ $this->form }}
        </div>
        <div class="mt-4">
            <x-filament::button class="w-full bg-blue-500 text-white hover:bg-blue-600" type="submit" wire:loading.attr="disabled">
                Submit
            </x-filament::button>
        </div>
    </form>
</div>

