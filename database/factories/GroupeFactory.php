<?php

namespace Database\Factories;

use App\Models\Certificat;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Utilisateur;

class GroupeFactory extends Factory
{
    public function definition()
    {
        return [
            'nomGroupe' => 'Groupe'.fake()->numberBetween(1,8),
            'certificat_id' => fake()->randomElement(Certificat::pluck('id')),
        ];
    }
}
