<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinetComptablesTable extends Migration
{
    public function up()
    {
        Schema::create('cabinet_comptables', function (Blueprint $table) {
            $table->id();
            $table->string('nom_cabinet');
            $table->foreignId('etat_financier_id')->constrained('etat_financiers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabinet_comptables');
    }
}
