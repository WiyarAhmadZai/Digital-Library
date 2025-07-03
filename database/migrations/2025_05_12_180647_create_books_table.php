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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image_path');
            $table->string('category');

            $table->decimal('price', 10, 2); // ✅ ADD THIS
            $table->decimal('final_price', 10, 2)->nullable(); // ✅ Keep this

            $table->string('currency_type');
            $table->string('language');
            $table->date('publish_year');
            $table->string('status');
            $table->integer('total_pages');
            $table->string('sku');
            $table->string('format');
            $table->string('country');
            $table->string('discount');
            $table->text('tags');
            $table->softDeletes();

            $table->foreignId('author_id')
                ->nullable()
                ->constrained('authors')
                ->onDelete('set null');

            $table->timestamps();
        });
    }





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
