<?php

namespace Tests\Feature\Livewire\Settings;

use App\Livewire\Settings\KeyComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class KeyComponentTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(KeyComponent::class)
            ->assertStatus(200);
    }
}
