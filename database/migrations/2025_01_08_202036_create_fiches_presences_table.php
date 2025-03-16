<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesPresencesTable extends Migration
{
    public function up()
    {
        Schema::create('fiches_presences', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre_heures');
            $table->foreignId('utilisateurs_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('groupe_id')->constrained('groupes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fiches_presences');
    }
}
