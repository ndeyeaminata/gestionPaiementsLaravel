<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
