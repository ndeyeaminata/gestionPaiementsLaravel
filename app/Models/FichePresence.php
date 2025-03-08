<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Correction : Importation de la classe BelongsTo
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
>>>>>>> Stashed changes

class FichePresence extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre_heures',
        'certificat',
        'numero_groupe',
        'statut',
        'mentor_id',
        'consultant_id',
    ];

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class, 'consultant_id');
    }
}
