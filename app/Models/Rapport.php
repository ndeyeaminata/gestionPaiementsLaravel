<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_soumission',
        'detail_rapport',
        'statut',
        'consultant_id',
    ];

    protected $casts = [
        'date_soumission' => 'datetime',
        'detail_rapport' => 'string',
        'statut' => 'string',
        'consultant_id' => 'integer',
    ];



    // Relation avec Consultant (One-to-Many)
    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class, 'consultant_id', 'id');
    }
}
