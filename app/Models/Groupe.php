<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomGroupe',
        'mentor_id',
        'certificat_id',
    ];

    protected $casts = [
        'nomGroupe' => string,
        'mentor_id' => integer,
        'certificat_id' => integer,
    ];

    public function fichesPresences()
{
    return $this->hasMany(FichePresence::class, 'groupe_id');
}

}
