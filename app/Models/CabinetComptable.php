<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabinetComptable extends Model
{
    use HasFactory;
    protected $fillable = ['nomCabinet', 'etatFinancier_id'];

    public function etatFinancier(): BelongsTo
    {
        return $this->belongsTo(EtatFinancier::class, 'etatFinancier_id');
    }


}
