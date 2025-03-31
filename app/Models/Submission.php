<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'submissions';

    // Define which fields can be mass-assigned
    protected $fillable = [
        'spouse',
        'will_type',
        'name',
        'spouse_name',
        'marriage_date',
        'address',
        'children_names',
        'children_ages',
        'special_needs',
        'own_property',
        'property_address',
        'property_value',
        'mortgage_amount',
        'co_owners',
        'has_business',
        'business_value',
        'business_partners',
        'healthcare_agent',
        'avoid_probate',
        'special_asset_instructions',
    ];
}
