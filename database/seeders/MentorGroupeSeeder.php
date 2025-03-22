<?php

namespace Database\Seeders;

use App\Models\Groupe;
use App\Models\MentorGroupe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentorGroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Groupe::all();

        foreach($groups as $group){
            MentorGroupe::factory()->create([
                'groupe_id' => $group->id
            ]);
        }
    }
}
