<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichePresence extends Model
{
    use HasFactory;

     /**
     * Les attributs assignables en masse.
     */
    protected $fillable=['nbreHeure', 'certificatMentore','numGroupe','statut'];


 /**
     * Relation avec le modèle Mentor (Utilisateur).
     */

     public function mentors()
     {
        return $this->belongsTo(Mentor::class, 'certificatMentore', 'idMentor'); //cle etrangère: certificatMentore
     }


}