<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'profession', 'headline', 'bio', 
        'photo', 'cv', 'email', 'phone', 'city', 'province', 'country'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}