<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Administrateur extends Model
{
    use HasFactory;
    protected $fillable = ['utilisateur_id', 'compte_id'];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    public function compte(): HasMany
    {
        return $this->hasMany(Compte::class, 'administrateur_id');
    }

}


