<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BotUser extends Pivot
{
    public const PIVOT_FIELDS = [
        'key',
    ];

    protected $hidden = [
        'key',
    ];
}
