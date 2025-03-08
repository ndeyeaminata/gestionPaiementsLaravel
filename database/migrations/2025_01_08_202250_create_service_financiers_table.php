<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFinanciersTable extends Migration
{
    public function up()
    {
        Schema::create('service_financiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('etat_financier_id')->constrained('etat_financiers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_financiers');
    }
}
