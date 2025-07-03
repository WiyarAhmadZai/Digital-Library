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
        // Random author
        $authorId = Author::inRandomOrder()->value('id');

        // Price and Discount
        $price = $this->faker->numberBetween(5, 100);
        $discountPercent = $this->faker->randomElement([0, 5, 10, 15]);

        // Calculate final price
        $finalPrice = $price - ($price * $discountPercent / 100);

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'image_path' => json_encode([
                $this->faker->imageUrl(200, 300, 'books'),
                $this->faker->imageUrl(200, 300, 'books')
            ]), // encoded as JSON array
            'category' => $this->faker->word(),
            'final_price' => $finalPrice,
            'price' => $price,
            'currency_type' => $this->faker->randomElement(['USD', 'EUR', 'GBP']),
            'language' => $this->faker->languageCode(),
            'publish_year' => $this->faker->date('Y-m-d'),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'total_pages' => $this->faker->numberBetween(100, 1000),
            'sku' => strtoupper($this->faker->bothify('???-#####')),
            'format' => $this->faker->randomElement(['hardcover', 'paperback', 'ebook']),
            'country' => $this->faker->country(),
            'discount' => $discountPercent, // stored as integer (e.g., 10 for 10%)
            'tags' => json_encode($this->faker->words(3)), // stored as JSON array
            'author_id' => $authorId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
