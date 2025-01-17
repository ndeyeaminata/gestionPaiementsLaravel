<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administrateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'compte_id',
        'role', // Ajoutez ici d'autres champs spécifiques à l'administrateur
    ];

    // Relation avec l'utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    // Relation avec le compte
    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }
}
