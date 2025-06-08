<?php

namespace Tests\Feature\Livewire\Settings;

use App\Livewire\Settings\Keys;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class KeysTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(Keys::class)
            ->assertStatus(200);
    }
}
