<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apprenant>
 */
class ApprenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomAp' => fake()->lastName(),
            'prenomAp' => fake()->firstName(),
            'ageAp' => fake()->numberBetween(16, 35),
            'adresseAp' => fake()->address(),
            'emailAp' => fake()->email(),
            'telephoneAp' => fake()->phoneNumber(),
        ];
    }
}
