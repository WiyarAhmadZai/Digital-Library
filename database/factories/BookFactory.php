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
        // Random author ID or null if no authors
        $authorId = Author::inRandomOrder()->value('id');

        // Price and Discount
        $price = $this->faker->numberBetween(5, 100);
        $discountPercent = $this->faker->randomElement([0, 5, 10, 15]);

        // Calculate final price
        $finalPrice = $price - ($price * $discountPercent / 100);

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),

            // Store multiple image URLs as JSON string
            'image_paths' => json_encode([
                $this->faker->imageUrl(200, 300, 'books'),
                $this->faker->imageUrl(200, 300, 'books')
            ]),

            'category' => $this->faker->word(),
            'price' => $price,
            'final_price' => $finalPrice,
            'currency_type' => $this->faker->randomElement(['USD', 'EUR', 'GBP']),
            'language' => $this->faker->languageCode(),

            // Faker date in Y-m-d format (year only could be used if you prefer)
            'publish_year' => $this->faker->date('Y-m-d'),

            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'total_pages' => $this->faker->numberBetween(100, 1000),
            'sku' => strtoupper($this->faker->bothify('???-#####')),
            'format' => $this->faker->randomElement(['hardcover', 'paperback', 'ebook']),
            'country' => $this->faker->country(),
            'discount' => $discountPercent,

            // Store tags as JSON string array
            'tags' => json_encode($this->faker->words(3)),

            // Optional PDF file path, fake filename (or null)
            'pdf_path' => $this->faker->boolean(70)
                ? 'uploads/pdf/' . $this->faker->uuid() . '.pdf'
                : null,

            'author_id' => $authorId,

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
