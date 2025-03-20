<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomCertificat',
        'date_debut',
        'date_fin',
    ];
/*
    protected $casts = [
        'nomCertificat' => string,
        'date_debut' => date,
        'date_fin'=> date,
        'consultant_id' => integer,
    ];
 */
public function utilisateur()
{
    return $this->belongsToMany(Utilisateur::class);
}
public function groupe()
{
    return $this->hasMany(Groupe::class);
}


}
