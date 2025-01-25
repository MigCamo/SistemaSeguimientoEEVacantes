<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educational_Experience_Vacancies extends Model
{
    protected $table = 'educational_experience_vacancies'; // Nombre exacto de la tabla
    use HasFactory;

    // La clave primaria y su tipo de dato, ya que no es 'id'
    protected $primaryKey = 'nrc';
    public $incrementing = false;
    protected $keyType = 'string';

    // Atributos que se pueden asignar de manera masiva
    protected $fillable = [
        'nrc',
        'school_period_code',
        'region_code',
        'departament_code',
        'area_code',
        'educational_experience_code',
        'class',
        'subGroup',
    ];

    // Relaciones con otros modelos
    public function schoolPeriod()
    {
        return $this->belongsTo(SchoolPeriod::class, 'school_period_code', 'code');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_code', 'code');
    }

    public function departament()
    {
        return $this->belongsTo(Departament::class, 'departament_code', 'code');
    }

    public function educationalExperience()
    {
        return $this->belongsTo(EducationalExperience::class, 'educational_experience_code', 'code');
    }

    // Puedes añadir otras relaciones, scopes o métodos específicos si los necesitas
}

