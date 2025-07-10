<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->text('body')->nullable();             // Text content
            $table->json('images')->nullable();           // Multiple image paths (as array)
            $table->json('pdfs')->nullable();             // Multiple PDF file paths (as array)

            $table->enum('visibility', ['public', 'private'])->default('public'); // Only public/private

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
