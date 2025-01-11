<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UNCHK extends Model
{
    use HasFactory;
    protected $fillable = ['montant', 'date_soumission', 'statut', 'etatFinancier_id'];

    public function etatFinancier(): BelongsTo
    {
        return $this->belongsTo(EtatFinancier::class, 'etatFinancier_id');
    }
}
