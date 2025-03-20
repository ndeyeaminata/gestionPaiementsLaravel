<?php

use App\Models\Statut;
use App\Models\Rapport;
use App\Models\EtatFinancier;
use App\Models\FichePresence;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('etat_fin_consultant', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EtatFinancier::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Rapport::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Statut::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

        });
        Schema::create('etat_fin_mentor', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EtatFinancier::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(FichePresence::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Statut::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_fin_consultant');
        Schema::dropIfExists('etat_fin_mentor');
    }
};
