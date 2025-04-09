<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomGroupe',
        'certificat_id',
    ];


    public function certificat(){
        return $this->belongsTo(Certificat::class);
    }

    public function utilisateur(){
        return $this->belongsToMany(Utilisateur::class);
    }



    public function fichePresence()
{
    return $this->hasMany(FichePresence::class, 'groupe_id');
}

}
