<div data> {{-- instantiate AlpineJS --}}

    {{-- Here are some different options for including a Filament themed button and interact with AlpineJS and Livewire --}}

    {{-- Use AlpineJS to dispatch JS event --}}
    <x-filament::button @click="$wire.dispatch('setThemeModeEvent', {theme:'light'})">
        Set To Light
    </x-filament::button>

    {{-- Use AlpineJS to dispatch JS event --}}
    <x-filament::button @click="$dispatch('setThemeModeEvent', {theme:'dark'})">
        Set To Dark
    </x-filament::button>

    {{-- Call Livewire method to dispatch event --}}
    <x-filament::button wire:click="setThemeMode('light')">
        Set To Light
    </x-filament::button>

    {{-- Use Livewire to dispatch JS event --}}
    <x-filament::button wire:click="$dispatch('toggleDarkModeEvent', {theme:'light'})">
        Toggle
    </x-filament::button>

    {{-- Use Livewire to dispatch JS event --}}
    <x-filament::button wire:click="$dispatch('setToSystemThemeModeEvent')">
        Set To System
    </x-filament::button>

    {{-- Call Livewire method to dispatch event --}}
    <x-filament::button wire:click="setToSystemThemeMode">
        Set To System
    </x-filament::button>

    <form wire:submit="create" class="w-full max-w-md bg-white p-6 rounded shadow">
        <div>
            {{ $this->form }}
            <x-filament-actions::modals />
        </div>
    </form>
</div>

