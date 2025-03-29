<?php

namespace App\Livewire;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Filament\Pages\Page as FilamentPage;
use Illuminate\Contracts\View\View;

class Submission extends FilamentPage implements HasForms
{
    use InteractsWithForms;
    public ?array $data = [];
    public ?string $type = null;
    public ?string $names = null;
    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Wizard Step 1')
                        ->schema([
                            Select::make('type')
                                ->label('Do you want:')
                                ->options([
                                    'a' => 'A',
                                    'b' => 'B',
                                    'not_sure' => 'Not Sure',
                                ]),
                        ]),

                    Wizard\Step::make('Wizard Step 2')
                        ->schema([
                            TextInput::make('names'),
                        ]),

                ])
            ]);
    }
    protected function getHeaderActions(): array
    {
        return [];
    }

    public function toggleDarkMode()
    {
        $this->dispatch('toggleDarkModeEvent');
    }

    public function setThemeMode(string $theme = 'light')
    {
        $this->dispatch('setThemeModeEvent', theme: $theme);
    }

   public function setToSystemThemeMode()
    {
        $this->dispatch('setToSystemThemeModeEvent');
    }

    #[Layout('layouts.guest')]
    public function render(): View
    {
        return view('livewire.submission');
    }
}
