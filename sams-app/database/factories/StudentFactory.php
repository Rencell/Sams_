<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'         => fake()->unique()->randomNumber(8),
            'Fname'      => fake()->unique()->firstName(),
            'Lname'      => fake()->unique()->lastName(),
            'email'      => fake()->unique()->email(),
            'birth_date' => fake()->date(),
            'gender'     => fake()->randomElement(['male', 'female']),
        ];
    }
}
