<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducationalExperience;
use App\Models\Curriculum;

class Curriculum_Educational_Experiences extends Model
{
    use HasFactory;
    protected $table = 'curriculum_educational_experiences';
    protected $fillable = [
        'ee_code',
        'curriculum_code',
    ];

    public function educationalExperience()
    {
        return $this->belongsTo(EducationalExperience::class, 'ee_code', 'code');
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_code', 'code');
    }
}
