<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'utilisateurs'; // Indique la table utilisée

    protected $fillable = ['nom', 'prenom', 'email', 'password', 'telephone'];

    protected $hidden = ['password', 'remember_token'];

    // Hashage du mot de passe
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->password && !password_get_info($user->password)['algo']) {
                $user->password = bcrypt($user->password);
            }
        });

        static::updating(function ($user) {
            if ($user->password && !password_get_info($user->password)['algo']) {
                $user->password = bcrypt($user->password);
            }
        });
    }

    // Relation avec le modèle Role
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
