<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Utilisateur;
use App\Models\Groupe;

class FichePresenceFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre_heures' => $this->faker->numberBetween(1, 8),
            'utilisateur_id' => Utilisateur::factory(),
            'groupe_id' => Groupe::factory(),
        ];
    }
}
