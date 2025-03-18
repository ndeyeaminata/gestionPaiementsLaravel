<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Utilisateur;

class GroupeFactory extends Factory
{
    public function definition()
    {
        return [
            'nomGroupe' => $this->faker->word . ' Group',
            'utilisateur_id' => Utilisateur::factory(),
            'certificat_id' => Certificat::factory(),
        ];
    }
}
