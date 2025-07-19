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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('last_name')->nullable();
            $table->string('profile_image')->nullable(); // path to image
            $table->text('biography')->nullable();       // bio or about section
            $table->string('phone_number')->nullable();
            $table->string('cover_image')->nullable();
            $table->json('purchased_books')->nullable();
            $table->text('profession')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profile');
    }
};
