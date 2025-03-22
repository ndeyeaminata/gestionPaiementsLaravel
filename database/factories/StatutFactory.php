<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatutFactory extends Factory
{
    public function definition()
    {
        return [
            'titreStatut' => $this->faker->randomElement(['En attente', 'Signé', 'Annulé']),

        ];
    }
}
