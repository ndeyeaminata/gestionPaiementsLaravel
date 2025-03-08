<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_soumission');
            $table->text('detail_rapport');
            $table->string('statut');
            $table->foreignId('consultant_id')->constrained('consultants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rapports');
    }
}
