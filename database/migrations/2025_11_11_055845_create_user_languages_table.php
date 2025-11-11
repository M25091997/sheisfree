<?php

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
        Schema::create('user_languages', function (Blueprint $table) {
            $table->id();

            // Link to user profile
            $table->foreignId('user_profile_id')
                ->constrained('user_profiles')
                ->cascadeOnDelete();

            // Language name (e.g. English, Hindi, French)
            $table->string('language');

            // Fluency level (Fluent, Good, Basic)
            $table->enum('fluency_level', ['Fluent', 'Good', 'Basic'])->default('Good');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_languages');
    }
};
