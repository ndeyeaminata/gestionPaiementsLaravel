<?php

use App\Models\Certificat;
use App\Models\EtatFinancier;
use App\Models\FichePresence;
use App\Models\Groupe;
use App\Models\Rapport;
use App\Models\Statut;
use App\Models\Utilisateur;
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
        Schema::create('certificat_consultant', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Certificat::class)->constrained()->cascadeOnDelete();
            //Id du consultant
            $table->foreignIdFor(Utilisateur::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

        });
        Schema::create('groupe_mentor', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Groupe::class)->constrained()->cascadeOnDelete();
            //Id du mentor
            $table->foreignIdFor(Utilisateur::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificat_consultant');
        Schema::dropIfExists('groupe_mentor');

    }
};
