<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum_Educational_Experiences extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ee_code',
        'curriculum_code',
    ];

    protected $guarded = [];
}
