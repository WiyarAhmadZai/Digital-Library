<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->string('name'); // Add the name column
            $table->text('bio');    // Add the bio column
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
         Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn(['name', 'bio']);
        });
    }
};
