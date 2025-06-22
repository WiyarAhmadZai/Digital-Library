<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'biography' => $this->faker->paragraph(),
            'image_path' => $this->faker->imageUrl(200, 200, 'people'),
            'country' => $this->faker->country(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
