<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title', 'issuer', 'issue_date', 'expire_date', 
        'credential_id', 'credential_url', 'image'
    ];

    protected function casts(): array
    {
        return [
            'issue_date' => 'date',
            'expire_date' => 'date',
        ];
    }
}