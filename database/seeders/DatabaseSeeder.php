<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PasswordResetToken;
use App\Models\Session;
use App\Models\Author;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 50 users
        User::factory(50)->create();

        // Create 50 authors
        Author::factory(50)->create();

        // Create 50 books (make sure authors exist before books)
        Book::factory(50)->create();
    }
}
