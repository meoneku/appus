<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'isbn'              => $this->faker->isbn13(),
            'title'             => $this->faker->sentence(),
            'book_number'       => $this->faker->numerify('###############'),
            'category_id'       => mt_rand(1,20),
            'publisher'         => $this->faker->company(),
            'author'            => $this->faker->name(),
            'rack'              => mt_rand(1,20),
            'public_year'       => mt_rand(1999,2020),
            'stock'             => mt_rand(1,5),
            'status'            => mt_rand(1,5),
            'desc'              => $this->faker->paragraph(6)
        ];
    }
}
