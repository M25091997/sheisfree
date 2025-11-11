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
        Schema::create('user_phones', function (Blueprint $table) {
            $table->id();

            // Link to user OR user_profile depending on your design
            $table->foreignId('user_profile_id')
                ->constrained('user_profiles')
                ->cascadeOnDelete();

            $table->string('phone_code');
            $table->string('phone_number');
            $table->boolean('is_whatsapp')->default(false);
            $table->boolean('is_wechat')->default(false);
            $table->boolean('is_telegram')->default(false);
            $table->boolean('is_signal')->default(false);
            $table->boolean('is_other')->default(false);
            $table->string('other_platform_name')->nullable(); // if "is_other" is true

            $table->boolean('account_created')->default(false); // indicates account linked/verified

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_phones');
    }
};
