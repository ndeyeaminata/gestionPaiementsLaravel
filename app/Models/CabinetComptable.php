<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CabinetComptable extends Model
{
    use HasFactory;

    protected $fillable = ['nomCabinet', 'adresse', 'telephone', 'email', 'etat_financier_id'];


    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    /**
     * Relation : Un CabinetComptable appartient à un EtatFinancier.
     */
    public function etatFinancier()
    {
        return $this->belongsTo(EtatFinancier::class);
    }
}
