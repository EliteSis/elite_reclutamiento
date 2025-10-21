<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'postulante_id',
        'nombre_archivo',
        'tipo_documento',
        'ruta',
        'formato',
    ];

    /**
     * Cada documento pertenece a un postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class);
    }
}
