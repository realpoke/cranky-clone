<?php

namespace Tests\Feature\Livewire\Settings;

use App\Livewire\Settings\Keys;
use Livewire\Livewire;
use Tests\TestCase;

class KeysTest extends TestCase
{
    public function test_renders_successfully(): void
    {
        Livewire::test(Keys::class)
            ->assertStatus(200);
    }
}
