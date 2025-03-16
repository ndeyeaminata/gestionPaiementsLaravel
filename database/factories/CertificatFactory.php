<?php

namespace Database\Factories;

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
            "date_fin" => fake()->dateTime($dateDebut+'6months'),
            "utilisateur_id" => Utilisateur::pluck('id')->where('role_id', 3)->first(),

        ];
    }
}
