<?php

namespace Database\Factories;

use App\Models\Statut;
use App\Models\Rapport;
use App\Models\EtatFinancier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EtatFinRapport>
 */
class EtatFinRapportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'etat_financier_id' => fake()->randomElement(EtatFinancier::pluck('id')),
            'rapport_id' => fake()->randomElement(Rapport::pluck('id')),
            'statut_id' => fake()->randomElement(Statut::pluck('id')),

        ];
    }
}
