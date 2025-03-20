<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FichePresence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_heures',
        'dateMentorat',
        'date_soumission',
    ];
/*
    protected $casts = [
        'nombre_heures' => integer,
        'utilisateur_id' => integer,
        'groupe_id' => integer,
    ]; */


/*
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id')->whereHas('role', function ($query) {
            $query->where('nomRole', 'mentor');
        });
    } */


    public function groupe()
    {
        return $this->belongsTo(MentorGroupe::class);
    }
}




