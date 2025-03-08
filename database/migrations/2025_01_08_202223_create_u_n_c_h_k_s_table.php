<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnchksTable extends Migration
{
    public function up()
    {
        Schema::create('unchks', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2);
            $table->dateTime('date_soumission');
            $table->string('statut');
            $table->foreignId('etat_financier_id')->constrained('etat_financiers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unchks');
    }
}
