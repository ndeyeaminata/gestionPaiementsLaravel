<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatFinFichePres extends Model
{
    use HasFactory;

    protected $table = 'etat_fin_mentor';


   public function statut()
   {
       return $this->belongsTo(Statut::class);
   }
}
