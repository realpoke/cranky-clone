<?php

namespace App\Models;

use App\Models\Pivots\BotUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bot extends Model
{
    public function User(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(BotUser::class)
            ->withPivot(BotUser::PIVOT_FIELDS)
            ->withTimestamps();
    }

    public function artificials(): HasMany
    {
        return $this->hasMany(Artificial::class);
    }
}
