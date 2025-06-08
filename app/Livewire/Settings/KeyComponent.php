<?php

namespace App\Livewire\Settings;

use App\Models\Bot;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class KeyComponent extends Component
{
    public Bot $bot;

    #[Validate()]
    public string $key = '';

    public bool $keySet;

    public function mount(): void
    {
        $this->keySet = property_exists($this->bot, 'pivot') && $this->bot->pivot !== null;
    }

    public function addKey(): void
    {
        $this->validate();

        $wasAdded = Auth::user()->addBotKey($this->bot, $this->key);

        if ($wasAdded) {
            $this->keySet = true;
            $this->reset('key');
        } else {
            $this->addError('key', 'This bot is already attached to your account.');
        }
    }

    public function removeKey(): void
    {
        $removed = Auth::user()->removeBotKey($this->bot);
        if ($removed === 1) {
            $this->keySet = false;
        }
    }

    protected function rules(): array
    {
        return [
            'key' => ['required', 'string', 'max:255', 'min:2'],
        ];
    }
}
