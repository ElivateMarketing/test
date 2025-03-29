<?php

namespace App\Livewire;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
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
            Wizard::make([
                // Step 1: Legal Background
                Wizard\Step::make('Legal Background')
                    ->schema([
                        Select::make('will_type')
                            ->label('Do you want:')
                            ->options([
                                'will' => 'A Will',
                                'will_trust' => 'A Will and Trust',
                                'not_sure' => 'Not Sure',
                            ])
                            ->required(),
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required(),
                        Select::make('spouse')
                            ->label('Do you have a spouse or domestic partner?')
                            ->options([
                                'yes' => 'Married or Domestic Partner',
                                'no' => 'No',
                            ])
                            ->reactive(),
                        TextInput::make('spouse_name')
                            ->label('Spouse/Domestic Partner Name')
                            ->visible(fn ($get) => $get('spouse') === 'yes'),
                        DatePicker::make('marriage_date')
                            ->label('Date of Marriage')
                            ->visible(fn ($get) => $get('spouse') === 'yes'),
                        TextInput::make('address')
                            ->label('Address')
                            ->required(),
                    ]),

                // Step 2: Children or Dependents
                Wizard\Step::make('Children or Dependents')
                    ->schema([
                        TextInput::make('children_names')
                            ->label('Children Names'),
                        TextInput::make('children_ages')
                            ->label('Children Ages'),
                        TextInput::make('special_needs')
                            ->label('Special Needs (Continued Care)'),
                    ]),

                // Step 3: Property and Business Information
                Wizard\Step::make('Property and Business Information')
                    ->schema([
                        Radio::make('own_property')
                            ->label('Do you own any property?')
                            ->options([
                                'yes' => 'Yes',
                                'no' => 'No',
                            ])
                            ->required(),
                        TextInput::make('property_address')
                            ->label('Property Address')
                            ->required()
                            ->visible(fn ($get) => $get('own_property') === 'yes'),
                        TextInput::make('property_value')
                            ->label('Property Value')
                            ->visible(fn ($get) => $get('own_property') === 'yes'),
                        TextInput::make('mortgage_amount')
                            ->label('Mortgage Amount')
                            ->visible(fn ($get) => $get('own_property') === 'yes'),
                        TextInput::make('co_owners')
                            ->label('Co-Owners')
                            ->visible(fn ($get) => $get('own_property') === 'yes'),
                        Radio::make('has_business')
                            ->label('Do you have a business?')
                            ->options([
                                'yes' => 'Yes',
                                'no' => 'No',
                            ])
                            ->required(),
                        TextInput::make('business_value')
                            ->label('Business Estimated Value')
                            ->visible(fn ($get) => $get('has_business') === 'yes'),
                        TextInput::make('business_partners')
                            ->label('Business Partners')
                            ->visible(fn ($get) => $get('has_business') === 'yes'),
                    ]),

                // Step 4: Health and Asset Distribution Preferences
                Wizard\Step::make('Health and Asset Distribution Preferences')
                    ->schema([
                        TextInput::make('healthcare_agent')
                            ->label('Do you want to designate someone to make healthcare decisions for you?')
                            ->required(),
                        Radio::make('avoid_probate')
                            ->label('Would you like to avoid the probate process?')
                            ->options([
                                'yes' => 'Yes',
                                'no' => 'No',
                            ])
                            ->required(),
                        TextInput::make('special_asset_instructions')
                            ->label('Do you have any special instructions for asset distribution?'),
                    ]),
            ])
                ]);
    }
    public function render()
    {
        return view('livewire.submission');
    }
}
