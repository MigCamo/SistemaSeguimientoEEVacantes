<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum_Educational_Experiences extends Model
{
    use HasFactory;
    protected $table = 'curriculum_educational_experiences';
    protected $fillable = [
        'ee_code',
        'curriculum_code',
    ];

    protected $guarded = [];
}
