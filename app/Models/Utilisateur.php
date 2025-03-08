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

    protected $fillable = ['nom', 'prenom', 'email', 'password', 'telephone', 'role_id'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string',
        'email' => 'string',
        'password' => 'string',
        'telephone' => 'string',
        'role_id' => 'integer',
    ];

    public $timestamps = false; // Désactiver si non utilisé

    // Hashage automatique du mot de passe
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

    public function setPasswordAttribute($value)
    {
        if (!password_get_info($value)['algo']) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    // Relation avec Role (One-to-One)
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
