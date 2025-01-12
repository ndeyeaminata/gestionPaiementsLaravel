<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fiche_presences', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre_heures');
            $table->string('certificat');
            $table->integer('numero_groupe');
            $table->string('statut');
            $table->foreignId('mentor_id')->constrained('mentors')->onDelete('cascade'); // Ajout de onDelete cascade
            $table->foreignId('consultant_id')->constrained('consultants')->onDelete('cascade'); // Ajout de onDelete cascade
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fiche_presences');
    }
};
