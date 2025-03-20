<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    protected $fillable = [
        'titreStatut', 'descriptionStatut'
    ];

    /* protected $cast = [
        'titreStatut' => string,
    ]; */

    public function etatFinRapport()
    {
        return $this->hasMany(EtatFinRapport::class);
    }

    public function etatFinFichePres()
    {
        return $this->hasMany(EtatFinFichePres::class);
    }
}
