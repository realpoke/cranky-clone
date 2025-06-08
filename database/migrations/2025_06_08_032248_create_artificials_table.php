<?php

use App\Models\Bot;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artificials', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(Bot::class);
            $table->string('name');
            $table->string('description');
            $table->json('capabilities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artificials');
    }
};
