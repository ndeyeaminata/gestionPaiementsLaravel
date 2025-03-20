<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultantCertificat extends Model
{
    use HasFactory;

    protected $table = 'certificat_consultant';

    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
}
