<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FichePresence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_heures',
        'certificat',
        'numero_groupe',
        'statut',
        'mentor_id',
    ];

    protected $casts = [
        'nombre_heures' => 'integer',
        'certificat' => 'string',
        'numero_groupe' => 'string',
        'statut' => 'string',
        'mentor_id' => 'integer',
    ];

   

    // Relation avec Mentor (One-to-Many)
    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }
}
