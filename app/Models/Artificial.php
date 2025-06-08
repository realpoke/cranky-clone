<?php

namespace App\Models;

use App\Enums\CapabilityEnum;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Artificial extends Pivot
{
    protected $table = 'artificials';

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function bot(): BelongsTo
    {
        return $this->belongsTo(Bot::class);
    }

    protected function casts(): array
    {
        return [
            'capabilities' => AsEnumCollection::of(CapabilityEnum::class),
        ];
    }
}
