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
        'role',
    ];

  

    // Relation avec l'utilisateur
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id', 'id');
    }

    // Relation avec le compte
    public function compte(): BelongsTo
    {
        return $this->belongsTo(Compte::class, 'compte_id', 'id');
    }
}
