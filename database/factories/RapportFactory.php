<?php

namespace Database\Factories;

use App\Models\ConsultantCertificat;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Utilisateur;

class RapportFactory extends Factory
{
    public function definition()
    {
        return [
            'date_soumission' => fake()->dateTimeBetween('-3months', now()),
            'detail_rapport' => fake()->sentences(5, true),
            'certificat_consultant_id' => fake()->randomElement(ConsultantCertificat::pluck('id')),
        ];
    }
}
