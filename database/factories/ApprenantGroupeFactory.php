<?php

namespace Database\Factories;

use App\Models\Apprenant;
use App\Models\Groupe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApprenantGroupe>
 */
class ApprenantGroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'apprenant_id' => fake()->randomElement(Apprenant::pluck('id')),
            'groupe_id' => fake()->randomElement(Groupe::pluck('id'))
        ];
    }
}
