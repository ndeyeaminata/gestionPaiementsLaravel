<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['utilisateur_id'];

    protected $casts = [
        'utilisateur_id' => 'integer',
    ];

   

    // Relation avec Utilisateur (One-to-One)
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id', 'id');
    }

    // Relation avec FichePresence (One-to-Many)
    public function fichesPresences(): HasMany
    {
        return $this->hasMany(FichePresence::class, 'mentor_id', 'id');
    }
}
