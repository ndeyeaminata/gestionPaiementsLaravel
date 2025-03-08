<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EtatFinancier extends Model
{
    use HasFactory;

    protected $fillable = ['statut'];

    protected $casts = [
        'statut' => 'string',
    ];


    // Relation avec CabinetComptable (One-to-One)
    public function cabinetComptable(): HasOne
    {
        return $this->hasOne(CabinetComptable::class, 'etat_financier_id', 'id');
    }
}
