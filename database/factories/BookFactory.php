<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author_id' => Author::inRandomOrder()->first()->id ?? null,
            'description' => $this->faker->paragraph,
            'published_at' => $this->faker->date(),
        ];
    }
}
