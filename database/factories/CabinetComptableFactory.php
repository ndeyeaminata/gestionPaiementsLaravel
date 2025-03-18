<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EtatFinancier;
use App\Models\Utilisateur;

class CabinetComptableFactory extends Factory
{
    public function definition()
    {
        return [
            'nomCabinet' => $this->faker->company,
            'adresse' => $this->faker->address,
            'etat_financier_id' => EtatFinancier::factory(),
            'utilisateur_id' => Utilisateur::factory(),
        ];
    }
}
