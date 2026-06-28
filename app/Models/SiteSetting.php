<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name', 'hero_title', 'hero_subtitle', 'about', 
        'logo', 'favicon', 'footer', 'primary_color', 'secondary_color'
    ];
}