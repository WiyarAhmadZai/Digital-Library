<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('title');             // Add the title column
            $table->foreignId('author_id');      // Add the foreign key for authors
            $table->text('description');         // Add the description column
            $table->date('published_at');        // Add the published_at column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['title', 'author_id', 'description', 'published_at']);
        });
    }
};
