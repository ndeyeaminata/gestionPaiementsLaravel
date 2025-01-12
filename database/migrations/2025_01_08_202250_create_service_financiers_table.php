<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_financiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Correction : champ 'nom' au lieu de 'nomService'
            $table->foreignId('etatFinancier_id')->constrained('etat_financiers')->onDelete('cascade'); // Correction : Nom correct du champ 'etatFinancier_id' et ajout de onDelete cascade
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_financiers');
    }
};
