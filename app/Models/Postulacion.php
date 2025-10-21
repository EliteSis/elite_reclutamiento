<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulaciones'; // 👈 importante

    protected $fillable = [
        'postulante_id',
        'fecha_postulacion',
        'estado',          // nuevo, en_evaluacion, aceptado, rechazado, repostulacion
        'observaciones',
    ];

    /**
     * Cada postulación pertenece a un postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class);
    }
}
