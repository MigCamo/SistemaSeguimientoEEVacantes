<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona_Dependencia_Programa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_zona',
        'nombre_zona',
        'clave_dependencia',
        'nombre_dependencia',
        'clave_programa',
        'nombre_programa',
        'horasIniciales',
        'horasUtilizadas',
        'horasDisponibles',
    ];

}
