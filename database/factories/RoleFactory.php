<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
            'nomRole' => $this->faker->word, // Génère un mot aléatoire pour nomRole
        ];
    }
}
