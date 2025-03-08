<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UNCHK extends Model
{
    use HasFactory;

    protected $fillable = ['montant', 'date_soumission', 'statut', 'etat_financier_id'];

    protected $casts = [
        'montant' => 'decimal:2',
        'date_soumission' => 'datetime',
        'statut' => 'string',
        'etat_financier_id' => 'integer',
    ];

   

    // Relation avec EtatFinancier (One-to-One)
    public function etatFinancier(): BelongsTo
    {
        return $this->belongsTo(EtatFinancier::class, 'etat_financier_id', 'id');
    }
}
