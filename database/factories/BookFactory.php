<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        // Get a random author id or null if no authors
        $authorId = Author::inRandomOrder()->value('id');

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'image_path' => $this->faker->imageUrl(200, 300, 'books'),
            'category' => $this->faker->word(),
            'price' => $this->faker->numberBetween(5, 100),
            'currency_type' => $this->faker->randomElement(['USD', 'EUR', 'GBP']),
            'language' => $this->faker->languageCode(),
            'publish_year' => $this->faker->date('Y-m-d'),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'total_pages' => $this->faker->numberBetween(100, 1000),
            'sku' => strtoupper($this->faker->bothify('???-#####')),
            'format' => $this->faker->randomElement(['hardcover', 'paperback', 'ebook']),
            'country' => $this->faker->country(),
            'discount' => $this->faker->randomElement(['0%', '5%', '10%', '15%']),
            'tags' => implode(',', $this->faker->words(3)),
            'author_id' => $authorId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
