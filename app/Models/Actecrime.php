<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actecrime extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeacte_id',
        'commentaire',
        'lieu',
        'region',
        'date',
        'heure',
        'latitude',
        'longitude',
    ];

    /**
     * Obtient le type d'acte associé à l'acte de crime.
     */
    public function typeActe()
    {
        return $this->belongsTo(TypeActe::class);
    }
}
