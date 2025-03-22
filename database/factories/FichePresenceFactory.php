<?php

namespace Database\Factories;

use App\Models\MentorGroupe;
use Illuminate\Database\Eloquent\Factories\Factory;

class FichePresenceFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre_heures' => $this->faker->numberBetween(1, 8),
            'dateMentorat' => $this->faker->dateTimeBetween('-3months', now()),
            'date_soumission' => $this->faker->dateTimeBetween('-3months', now()),
            'groupe_mentor_id' => $this->faker->randomElement(MentorGroupe::pluck('id')),
        ];
    }
}
