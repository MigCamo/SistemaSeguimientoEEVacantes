<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions_Educational_Program extends Model
{
    use HasFactory;

    protected $table = 'regions_educational_programs'; // Nombre correcto de la tabla

    protected $fillable = [
    'region_code',
    'departament_code',
    'educational_program_code',
    ];
}
