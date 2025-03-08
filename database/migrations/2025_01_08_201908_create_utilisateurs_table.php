<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone');
<<<<<<< Updated upstream
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // Ajout de onDelete cascade
=======
            $table->string('role_id');
            $table->rememberToken(); // Ajoute la colonne remember_token
>>>>>>> Stashed changes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
