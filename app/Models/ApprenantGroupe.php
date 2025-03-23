<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ApprenantGroupe extends Model
{
    use HasFactory;

    protected $table = 'apprenants_groupes';


    public function fiche_presence():BelongsToMany
    {
        return $this->belongsToMany(FichePresence::class);
    }
}
