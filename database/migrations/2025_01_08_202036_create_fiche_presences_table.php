<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fiche_presences', function (Blueprint $table) {
            $table->id();  // Cela crée la colonne 'id' comme clé primaire
            $table->foreignId('mentor_id')->constrained();
            $table->foreignId('consultant_id')->constrained();
            $table->integer('nombre_heures');
            $table->string('certificat');
            $table->integer('numero_groupe');
            $table->string('statut');
            $table->timestamps();
        });
        
    }


    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_presences');
    }
};
