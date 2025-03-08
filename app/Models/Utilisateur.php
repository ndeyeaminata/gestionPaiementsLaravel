<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email', 'password', 'telephone', 'role_id'];

<<<<<<< Updated upstream
=======
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'telephone', 'role_id'];

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
>>>>>>> Stashed changes
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
