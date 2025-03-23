<?php

use App\Models\Apprenant;
use App\Models\ApprenantGroupe;
use App\Models\FichePresence;
use App\Models\Groupe;
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
        Schema::create('apprenants', function (Blueprint $table) {
            $table->id();
            $table->string('nomAp');
            $table->string('prenomAp');
            $table->string('ageAp');
            $table->string('emailAp');
            $table->string('telephoneAp');
            $table->string('adresseAp');
            $table->timestamps();
        });

        Schema::create('apprenants_groupes', function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Apprenant::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Groupe::class)->constrained()->cascadeOnDelete();
            $table->unique('apprenant_id', 'groupe_id');
            $table->timestamps();
        });

        Schema::create('apprenants_presences', function(Blueprint $table){
            $table->foreignId('apprenants_groupe_id')->constrained('apprenants_groupes')->cascadeOnDelete();
            $table->foreignIdFor(FichePresence::class)->constrained()->cascadeOnDelete();
            $table->boolean('presence')->default(true);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprenants');
        Schema::dropIfExists('apprenants_groupes');
        Schema::dropIfExists('apprenants_presences');
    }
};
