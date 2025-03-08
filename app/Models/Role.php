<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nom_role'];

    protected $casts = [
        'nom_role' => 'string',
    ];

    

    // Relation avec Utilisateur (One-to-Many)
    public function utilisateurs(): HasMany
    {
        return $this->hasMany(Utilisateur::class, 'role_id', 'id');
    }
}
