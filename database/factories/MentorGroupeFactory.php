<?php

namespace Database\Factories;

use App\Models\Groupe;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MentorGroupe>
 */
class MentorGroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'utilisateur_id'=> fake()->randomElement(
                Utilisateur::join('roles', 'roles.id', '=', 'utilisateurs.role_id')
                    ->where('roles.nomRole', 'like', '%Mentor%')->pluck('utilisateurs.id')
                    ) ,
            'groupe_id' => fake()->randomElement(Groupe::pluck('id'))
        ];
    }
}
