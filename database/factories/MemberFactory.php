<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_name'       => $this->faker->name(),
            'major_id'          => mt_rand(1,24),
            'member_number'     => $this->faker->numerify('##########'),
            'year'              => mt_rand(2018,2022),
            'gender'            => $this->faker->randomElement(['Laki-laki','Perempuan']),
            'phonenumber'       => $this->faker->numerify('628##########'),
            'addres'            => $this->faker->address(),
         // 'photo'             => 'member-photo/default.png',
            'desc'              => $this->faker->sentence(6)
        ];
    }
}
