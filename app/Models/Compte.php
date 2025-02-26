<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash; // Import de la classe Hash

class Compte extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'password'];

    // Setter pour hacher le mot de passe avant de l'enregistrer
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
