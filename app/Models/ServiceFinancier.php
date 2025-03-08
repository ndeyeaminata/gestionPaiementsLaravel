<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFinancier extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'etat_financier_id'];

    protected $casts = [
        'nom' => 'string',
        'etat_financier_id' => 'integer',
    ];

    

    // Relation avec EtatFinancier (One-to-One)
    public function etatFinancier(): BelongsTo
    {
        return $this->belongsTo(EtatFinancier::class, 'etat_financier_id', 'id');
    }
}
