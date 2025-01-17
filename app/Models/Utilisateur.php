<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Utilisateur extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'telephone', 'role_id'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
