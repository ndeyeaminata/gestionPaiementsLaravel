<?php

namespace Database\Seeders;

use App\Models\Certificat;
use App\Models\ConsultantCertificat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultantCertificatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificats = Certificat::all();

        foreach($certificats as $cert){
            ConsultantCertificat::factory()->create([
                'certificat_id' => $cert->id
            ]);
        }
    }
}
