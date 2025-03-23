<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomAp', 'prenomAp', 'ageAp', 'telephoneAp', 'emailAp', 'adresseAp'
    ];

    public function groupe(){
        return $this->belongsToMany(Groupe::class);
    }
}
