<div data> 
    <form wire:submit="create" class="w-full max-w-100 bg-white p-6 rounded shadow">
        <div>
            {{ $this->form }}
            <x-filament-actions::modals />

            <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">
                Test Button
            </button>
        </div>
    </form>
</div>

