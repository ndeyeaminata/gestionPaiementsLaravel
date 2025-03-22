<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Statut;

class EtatFinancierFactory extends Factory
{
    public function definition()
    {
        return [
            'montant' => $this->faker->randomFloat(2, 1000, 10000),
        ];
    }
}
