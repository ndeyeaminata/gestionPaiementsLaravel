<?php

use App\Models\Utilisateur;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinetComptablesTable extends Migration
{
    public function up()
    {
        Schema::create('cabinet_comptables', function (Blueprint $table) {
            $table->id();
            $table->string('Nomcabinet');
            $table->string('adresse');
            $table->foreignIdFor(Utilisateur::class)->constrained()->onDelete('cascade');
            $table->foreignId('etat_financier_id')->constrained('etat_financiers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabinet_comptables');
    }
}
