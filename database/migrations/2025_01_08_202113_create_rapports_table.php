<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->date('date_soumission');
            $table->string('detail_rapport');
            $table->string('statut');
            $table->foreignId('consultant_id')->constrained('consultants')->onDelete('cascade'); // Ajout de onDelete cascade
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
