<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the users table to avoid duplicate email errors
        User::truncate();
        Post::truncate(); // Optionally truncate posts table too if needed
        Author::truncate(); // Optionally truncate authors table too

        // Enable foreign key checks again
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Seed new data
        Author::factory(100)->create();
        Book::factory(100)->create();
        Post::factory(100)->create();
        User::factory(100)->create();
    }
}
