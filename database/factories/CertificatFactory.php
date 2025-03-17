<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificat>
 */
class CertificatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $certificats = [
            "Certificat PHP",
            "Certificat Python",
            "Certificat Java",
            "Certificat Front-End",
        ];

        return [
            "nomCertificat" => fake()->randomElement($certificats),
            "date_debut" => $dateDebut = fake()->dateTimeBetween(now(), '+3months'),
            "date_fin" => Carbon::parse($dateDebut)->addMonths(6),
            //selectionner mentor
            "utilisateur_id" => fake()->randomElement(Utilisateur::where('role_id', 3)->pluck('id')),
        ];
    }
}
