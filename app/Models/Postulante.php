<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar en masa (mass assignment).
     * Es fundamental agregar aquí todos los campos nuevos de la base de datos.
     */
    protected $fillable = [
        // Campos originales
        'apellidos_nombres',
        'dni',
        'email',
        'telefono',
        'fecha_nacimiento',
        'direccion',
        'nivel_academico',
        'experiencia_laboral',
        'referencias',
        'estado',

        // Nuevos campos de lógica condicional
        'vacunado',
        'numero_vacunas',
        'tiene_vehiculo',
        'tipo_vehiculo',
        'tiene_soat',
        'numero_soat',
        'tiene_licencia_l1',
        'vigencia_licencia_l1',
        'tiene_licencia_l4',
        'vigencia_licencia_l4',
        'tiene_licencia_l5',
        'vigencia_licencia_l5',

        // Nuevas banderas (Sí/No)
        'recibo_agua',
        'certificado_estudios',
        'certiadulto',
        'multa_electoral',
        'antecedentes_penales',

        // Nuevos campos numéricos, de texto y enums
        'estatura',
        'peso',
        'imc',
        'numero_hijos',
        'sexo',
        'estado_civil',
        'operador',
        'cuenta_bancaria',
        'banco',
        'talla_pantalon',
        'talla_casaca',
        'talla_polo',
        'talla_camisa',
        'talla_zapato',
        'tipo_licencia',
        'placa',
        'ciudad_postular',
        'distrito',
        'departamento',
        'provincia',
        'curso',
        'carnet',
        'detalle_experiencia',

        // Nuevos campos para rutas de archivos
        'pdf_dni_hijos',
        'cv',
        'pdf_antecedentes_penales',
        'pdf_carnet_vacuna',
        'pdf_recibo_agua',
        'pdf_certificado_estudios',
        'pdf_certiadulto',
        'foto',
        'pdf_curso',
        'pdf_licencia_l1_sucamec',
        'pdf_licencia_l4_sucamec',
        'pdf_licencia_l5_sucamec',
    ];

    /**
     * Conversión de tipos (Casts).
     * Esto asegura que los campos se devuelvan como el tipo de dato correcto en PHP.
     * Por ejemplo, los TINYINT(1) se devolverán como true/false en lugar de 1/0.
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
        'vacunado' => 'boolean',
        'tiene_vehiculo' => 'boolean',
        'tiene_soat' => 'boolean',
        'tiene_licencia_l1' => 'boolean',
        'tiene_licencia_l4' => 'boolean',
        'tiene_licencia_l5' => 'boolean',
        'recibo_agua' => 'boolean',
        'certificado_estudios' => 'boolean',
        'certiadulto' => 'boolean',
        'multa_electoral' => 'boolean',
        'antecedentes_penales' => 'boolean',
        'estatura' => 'decimal:2',
        'peso' => 'decimal:2',
        'imc' => 'decimal:1',
        'numero_hijos' => 'integer',
        'vigencia_licencia_l1' => 'date',
        'vigencia_licencia_l4' => 'date',
        'vigencia_licencia_l5' => 'date',
    ];

    /**
     * Un postulante puede tener muchos documentos.
     * (Esta relación ya existía y se mantiene)
     */
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    /**
     * Un postulante puede tener muchas postulaciones.
     * (Esta relación ya existía y se mantiene)
     */
    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }
}