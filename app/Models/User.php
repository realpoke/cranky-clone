<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Pivots\BotUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }

    public function bots(): BelongsToMany
    {
        return $this->belongsToMany(Bot::class)
            ->using(BotUser::class)
            ->withPivot(BotUser::PIVOT_FIELDS)
            ->withTimestamps();
    }

    public function addBotKey(Bot $bot, string $key): bool
    {
        if ($this->bots()->where('bot_id', $bot->id)->exists()) {
            return false;
        }

        $this->bots()->attach($bot->id, ['key' => $key]);

        return true;
    }

    public function removeBotKey(Bot $bot): int
    {
        return $this->bots()->detach($bot);
    }

    protected static function booted(): void
    {
        static::deleting(function (User $user): void {
            $user->bots()->detach();
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
