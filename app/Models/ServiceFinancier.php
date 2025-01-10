<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFinancier extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'etatFinancier_id'];

    public function etatFinancier(): BelongsTo
    {
        return $this->belongsTo(EtatFinancier::class, 'etatFinancier_id');
    }
}
