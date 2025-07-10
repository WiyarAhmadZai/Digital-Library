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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // required
            $table->string('last_name'); // required
            $table->text('biography'); // required
            $table->string('country'); // required
            $table->string('email')->unique(); // required
            $table->json('image_paths')->nullable(); // optional
            $table->string('website')->nullable(); // optional


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
