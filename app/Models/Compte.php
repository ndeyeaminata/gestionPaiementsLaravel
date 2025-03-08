<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compte extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'password', 'utilisateur_id'];
    protected $hidden = ['password'];
    protected $casts = [
        'email' => 'string',
        'password' => 'string',
    ];



    // Relation avec Utilisateur (One-to-One)
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id', 'id');
    }

    // Setter pour hacher le mot de passe
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
