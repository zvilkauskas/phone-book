<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PhoneBook extends Model
{
    protected $fillable = [
        'user_id',
        'country_id',
        'name',
        'phone',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function sharedWithUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'phone_book_user')->withTimestamps();
    }
}
