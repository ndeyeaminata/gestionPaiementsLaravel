<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cabinet_comptables', function (Blueprint $table) {
            $table->id();
            $table->string('nomCabinet');
            $table->foreignId('etatFinancier_id')->constrained('etat_financiers')->onDelete('cascade'); // Ajout de onDelete cascade
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cabinet_comptables');
    }
};
