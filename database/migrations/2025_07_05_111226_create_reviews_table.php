<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('parent_id')->nullable(); // no ->after()

            $table->foreignId('book_id')->constrained()->onDelete('cascade');

            $table->string('user_name');
            $table->string('user_email');
            $table->tinyInteger('rating')->nullable();
            $table->text('comment')->nullable();

            $table->timestamps();

            // Define foreign key AFTER defining the columns
            $table->foreign('parent_id')->references('id')->on('reviews')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
