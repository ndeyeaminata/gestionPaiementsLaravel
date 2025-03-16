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
        'consultant_id',
    ];

    protected $casts = [
        'nomCertificat' => string,
        'date_debut' => date,
        'date_fin'=> date,
        'consultant_id' => integer,
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }


}
