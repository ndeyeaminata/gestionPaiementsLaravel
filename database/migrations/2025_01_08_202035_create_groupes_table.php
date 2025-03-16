<?php


use App\Models\Certificat;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string('nomGroupe');
            $table->foreignIdFor(Utilisateur::class)->constrained()->cascadeOnDelete();
            $table->foreignId('certificat_id')->constrained('certificats');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupes');
    }
};
