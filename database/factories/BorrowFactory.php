<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_id'     => mt_rand(1,1000),
            'borrow_date'   => Carbon::now()->subDays(rand(0, 7))->format('Y-m-d'),
            'return_date'   => Carbon::now()->subDays(rand(8, 14))->format('Y-m-d'),
            'borrow_number' => $this->faker->numerify('2021#####'),
        ];  
    }
}
