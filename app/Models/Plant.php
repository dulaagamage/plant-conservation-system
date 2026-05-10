<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name',
        'scientific_name',
        'category',
        'uses',
        'description',
        'image_url',
        'qr_url'
    ];
}
