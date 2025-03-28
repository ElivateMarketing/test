<?php

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class Submission extends Component implements HasForms
{   
    use InteractsWithForms;
    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->placeholder('Enter your name'),
                TextInput::make('email'),
                TextInput::make('phone')
                    ->label('Phone Number')
                    ->required()
                    ->placeholder('Enter your phone number'),
            ]);
    }
    public function render()
    {
        return view('livewire.submission');
    }
}
