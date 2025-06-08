<?php

namespace App\Models;

use App\Enums\MessageTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    public function artificial(): BelongsTo
    {
        return $this->belongsTo(Artificial::class);
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    protected function casts(): array
    {
        return [
            'message_type' => MessageTypeEnum::class,
            'context_message_ids' => 'array',
        ];
    }
}
