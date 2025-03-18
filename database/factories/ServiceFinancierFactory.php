<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EtatFinancier;

class ServiceFinancierFactory extends Factory
{
    public function definition()
    {
        return [
            'nom' => $this->faker->company,
            'etat_financier_id' => EtatFinancier::factory(),
        ];
    }
}
