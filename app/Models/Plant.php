<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [

        // 🌿 Core
        'name',
        'scientific_name',
        'category',
        'uses',
        'description',
        'image_url',
        'qr_url',

        // 🌍 Conservation & Ecology
        'conservation_status',
        'is_endemic',
        'habitat',

        // 🧪 Ayurveda / Traditional
        'ayurveda_uses',
        'cultural_significance',

        // 🔬 Research
        'active_compounds',
        'research_notes',
        'studied_by',

        // 🐝 Biodiversity
        'ecological_role',
        'associated_wildlife',

        // 📍 Location
        'garden_zone',
        'gps_coordinates',
    ];
}
