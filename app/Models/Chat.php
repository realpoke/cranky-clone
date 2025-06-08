<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
