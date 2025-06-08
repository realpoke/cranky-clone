<?php

namespace Database\Seeders;

use App\Models\Bot;
use Illuminate\Database\Seeder;

class BotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bot::updateOrCreate(
            ['provider' => 'Google'],
            ['description' => 'Google Gemini AI']
        );

        Bot::updateOrCreate(
            ['provider' => 'OpenAI'],
            ['description' => 'OpenAI GPT AI']
        );
    }
}
