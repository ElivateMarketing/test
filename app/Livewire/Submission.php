<?php

namespace App\Livewire;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
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
    public ?string $will_type = null; 
    public ?string $name = null;   
    public $spouse;                  
    public ?string $spouse_name = null;
    public ?string $marriage_date = null; 
    public ?string $address = null; 
    public ?string $children_names = null;
    public ?string $children_ages = null; 
    public ?string $special_needs = null; 
    public ?string $own_property = null; 
    public ?string $property_address = null; 
    public ?string $property_value = null; 
    public ?string $mortgage_amount = null; 
    public ?string $co_owners = null;
    public ?string $has_business = null; 
    public ?string $business_value = null; 
    public ?string $business_partners = null; 

    public ?string $healthcare_agent = null; 
    public ?string $avoid_probate = null; 
    public ?string $special_asset_instructions = null; 
    
    protected $rules = [
        'spouse' => 'required|string',
        'will_type' => 'required|string',
        'name' => 'required|string',
        'spouse_name' => 'required_if:spouse,yes|string',
        'marriage_date' => 'required_if:spouse,yes|date',
        'address' => 'required|string',
        'children_names' => 'nullable|string',
        'children_ages' => 'nullable|string',
        'special_needs' => 'nullable|string',
        'own_property' => 'required|string',
        'property_address' => 'required_if:own_property,yes|string',
        'property_value' => 'required_if:own_property,yes|string',
        'mortgage_amount' => 'required_if:own_property,yes|string',
        'co_owners' => 'nullable|string',
        'has_business' => 'required|string',
        'business_value' => 'required_if:has_business,yes|string',
        'business_partners' => 'nullable|string',
        'healthcare_agent' => 'required|string',
        'avoid_probate' => 'required|string',
        'special_asset_instructions' => 'nullable|string',
    ];

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
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
                                ->required()
                                ->reactive(), // Makes this field reactive
                            TextInput::make('spouse_name')
                                ->label('Spouse/Domestic Partner Name')
                                ->required()
                                ->visible(fn ($get) => $get('spouse') === 'yes'), // Conditional visibility
                            DatePicker::make('marriage_date')
                                ->label('Date of Marriage')
                                ->visible(fn ($get) => $get('spouse') === 'yes'), // Conditional visibility
                            TextInput::make('address')
                                ->label('Address')
                                ->required(),
                        ]),
                    
                        Wizard\Step::make('Children or Dependents')
                    ->schema([
                        TextInput::make('children_names')
                            ->label('Children Names'),
                        TextInput::make('children_ages')
                            ->label('Children Ages'),
                        TextInput::make('special_needs')
                            ->label('Special Needs (Continued Care)'),
                    ]),

                    Wizard\Step::make('Property and Business Information')
                    ->schema([
                        Radio::make('own_property')
                            ->label('Do you own any property?')
                            ->options([
                                'yes' => 'Yes',
                                'no' => 'No',
                            ])
                            ->reactive()
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
                            ->reactive()
                            ->required(),
                        TextInput::make('business_value')
                            ->label('Business Estimated Value')
                            ->visible(fn ($get) => $get('has_business') === 'yes'),
                        TextInput::make('business_partners')
                            ->label('Business Partners')
                            ->visible(fn ($get) => $get('has_business') === 'yes'),
                    ]),

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
