<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesPresencesTable extends Migration
{
    public function up()
    {
        Schema::create('fiche_presences', function (Blueprint $table) {
            $table->id();
            $table->date('dateMentorat');
            $table->integer('nombre_heures');
            $table->dateTime('date_soumission');
            $table->foreignId('groupe_mentor_id')->constrained('groupe_mentor')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fiches_presences');
    }
}
