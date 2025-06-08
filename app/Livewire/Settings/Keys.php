<?php

namespace App\Livewire\Settings;

use App\Models\Bot;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Keys extends Component
{
    #[Computed()]
    public function bots(): Collection
    {
        $userBots = Auth::user()->bots()->get()->keyBy('id');
        $allBots = Bot::all()->keyBy('id');

        return $userBots->union($allBots)->sortBy('name')->values();
    }
}
