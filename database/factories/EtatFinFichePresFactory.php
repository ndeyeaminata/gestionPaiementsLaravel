<?php

namespace Database\Factories;

use App\Models\Statut;
use App\Models\EtatFinancier;
use App\Models\FichePresence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EtatFinFichePres>
 */
class EtatFinFichePresFactory extends Factory
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
            'fiche_presence_id' => fake()->randomElement(FichePresence::pluck('id')),
            'statut_id' => fake()->randomElement(Statut::pluck('id')),

        ];
    }
}
