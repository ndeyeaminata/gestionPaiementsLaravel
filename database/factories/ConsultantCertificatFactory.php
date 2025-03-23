<?php

namespace Database\Factories;

use App\Models\Certificat;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConsultantCertificat>
 */
class ConsultantCertificatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'utilisateur_id'=> fake()->randomElement(
                Utilisateur::join('roles', 'roles.id', '=', 'utilisateurs.role_id')
                ->where('roles.nomRole', 'like', '%Consultant%')->pluck('utilisateurs.id')
                ),
            'certificat_id' => fake()->randomElement(Certificat::pluck('id'))
        ];
    }
}
