<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CabinetComptable extends Model
{
    use HasFactory;

    protected $fillable = ['nomCabinet', 'etat_financier_id'];


    // Relation avec EtatFinancier
    public function etatFinancier(): BelongsTo
    {
        return $this->belongsTo(EtatFinancier::class, 'etat_financier_id', 'id');
    }
}
