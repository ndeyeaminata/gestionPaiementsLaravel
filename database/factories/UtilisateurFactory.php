<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom" => fake()->lastName(),
            "prenom" => fake()->firstName(),
            "email" => fake()->email(),
            "telephone" => fake()->phoneNumber(),
            "password" => ("passer123"),
            "role_id" => fake()->randomElement(Role::pluck('id'))
        ];
    }
}
