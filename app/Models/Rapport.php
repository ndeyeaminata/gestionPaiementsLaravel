<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_soumission',
        'detail_rapport',
    ];

   /*  protected $casts = [
        'date_soumission' => dateTime,
        'detail_rapport' => string,
        'statut' => string,
        'consultant_id' => integer,
    ]; */



    public function consultant(): BelongsTo
    {
        return $this->belongsTo(ConsultantCertificat::class);
    }
}
