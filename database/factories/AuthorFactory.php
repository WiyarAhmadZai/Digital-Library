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
            'country' => $this->faker->country(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'image_paths' => json_encode([
                'uploads/authors/' . $this->faker->image('storage/app/public/uploads/authors', 200, 200, null, false),
            ]),
        ];
    }
}
