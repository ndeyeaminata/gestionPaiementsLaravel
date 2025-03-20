<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatFinanciersTable extends Migration
{
    public function up()
    {
        Schema::create('etat_financiers', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant',10,2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etat_financiers');
    }
}
