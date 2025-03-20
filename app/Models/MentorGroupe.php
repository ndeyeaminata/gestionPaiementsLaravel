<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorGroupe extends Model
{
    use HasFactory;

    protected $table = 'groupe_mentor';


    public function fichePresence()
    {
        return $this->hasMany(FichePresence::class);
    }
}
