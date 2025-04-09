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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public $timestamps = false; // Désactiver si non utilisé

    // Hashage automatique du mot de passe
    public function setPasswordAttribute($value)
    {
        if (!password_get_info($value)['algo']) {
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

    // Relation avec Role (One-to-One)
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
