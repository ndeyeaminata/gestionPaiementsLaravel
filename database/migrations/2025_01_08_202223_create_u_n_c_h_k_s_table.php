<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('u_n_c_h_k_s', function (Blueprint $table) {
            $table->id();
            $table->integer('montant');
            $table->date('date_soumission');
            $table->string('statut');
            $table->foreignId('etatFinancier_id')->constrained('etat_financiers')->onDelete('cascade'); // Ajout de onDelete cascade
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('u_n_c_h_k_s');
    }
};
