<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company', 'position', 'employment_type', 'location', 
        'description', 'logo', 'start_date', 'end_date', 'currently_working'
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'currently_working' => 'boolean',
        ];
    }
}