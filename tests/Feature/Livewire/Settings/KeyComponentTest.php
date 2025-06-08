<?php

namespace Tests\Feature\Livewire\Settings;

use App\Livewire\Settings\KeyComponent;
use Livewire\Livewire;
use Tests\TestCase;

class KeyComponentTest extends TestCase
{
    public function test_renders_successfully(): void
    {
        Livewire::test(KeyComponent::class)
            ->assertStatus(200);
    }
}
