<?php
namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Fetch users to associate with posts
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('No users found. Please create users first.');
            return;
        }

        // Ensure user_id is always set to a valid user
        Post::factory()->count(10)->create([
            'user_id' => $users->random()->id,  // Ensure this is set properly
        ]);
    }
}
