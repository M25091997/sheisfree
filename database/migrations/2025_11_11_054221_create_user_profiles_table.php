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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('name');
            $table->string('user_type');
            $table->string('city')->nullable();
            $table->text('about')->nullable();

            // Contact / Web
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('online_url')->nullable();
            $table->string('other_url')->nullable();

            // Personal Attributes
            $table->enum('gender', ['male', 'female', 'transsexual', 'other'])->nullable();
            $table->string('orientation')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('height')->nullable();
            $table->unsignedTinyInteger('age')->nullable();
            $table->string('bust')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('nationality')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('shaved')->nullable();

            // Lifestyle
            $table->boolean('smoke')->nullable();
            $table->boolean('drink')->nullable();
            $table->string('health')->nullable();

            // Media & Links
            $table->string('video_path')->nullable();
            $table->string('social_media_url')->nullable();
            $table->string('other_social_media')->nullable();

            // Notes & Status
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_member')->default(false);
            $table->date('member_date')->nullable();

            // Relationship
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
