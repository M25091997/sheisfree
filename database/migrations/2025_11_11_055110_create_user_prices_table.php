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
        Schema::create('user_prices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_profile_id')
                ->constrained('user_profiles')
                ->cascadeOnDelete();

            $table->string('service_type');
            $table->string('duration')->nullable(); // e.g. "30 min", "1 hour", "overnight"
            $table->decimal('price', 10, 2)->nullable();
            $table->string('currency', 10)->default('INR'); // Optional
            $table->boolean('is_offer')->default(false); // Optional flag for discounts
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_prices');
    }
};
