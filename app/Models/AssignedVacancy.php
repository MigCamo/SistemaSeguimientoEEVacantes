<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedVacancy extends Model
{
    use HasFactory;

    protected $table = 'assigned_vacancies'; // Nombre de la tabla en la BD

    protected $primaryKey = 'id'; // Clave primaria

    public $timestamps = true; // Habilita `created_at` y `updated_at`

    protected $fillable = [
        'ee_vacancy_code',
        'lecturer_code',
        'reason_code',
        'type_asignation_code',
        'noticeDate',
        'assignmentDate',
        'notes',
        'openingDate',
        'closingDate'
    ];

    /**
     * Relación con la vacante de experiencia educativa.
     */
    public function educationalExperienceVacancy()
    {
        return $this->belongsTo(Educational_Experience_Vacancies::class, 'ee_vacancy_code', 'nrc');
    }

    /**
     * Relación con el docente (lecturer).
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_code', 'staff_number');
    }

    /**
     * Relación con el motivo (reason).
     */
    public function reason()
    {
        return $this->belongsTo(Reason::class, 'reason_code', 'code');
    }

    /**
     * Relación con el tipo de asignación.
     */
    public function typeAsignation()
    {
        return $this->belongsTo(TypeAsignation::class, 'type_asignation_code', 'id');
    }
}
