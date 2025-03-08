<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Consultant extends Model
{
    use HasFactory;

    protected $fillable = ['utilisateur_id'];

    

    // Relation avec Utilisateur (One-to-One)
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id', 'id');
    }

    // Relation avec Rapport (One-to-Many)
    public function rapports(): HasMany
    {
        return $this->hasMany(Rapport::class, 'consultant_id', 'id');
    }
}
