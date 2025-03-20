<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatFinRapport extends Model
{
    use HasFactory;

    protected $table = 'etat_fin_consultant';


   public function statut()
   {
       return $this->belongsTo(Statut::class);
   }

}
