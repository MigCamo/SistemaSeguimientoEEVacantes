<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalExperience extends Model
{
    use HasFactory;

    //protected $primaryKey = 'nrc';

    protected $fillable = [
        'code',
        'name',
        'hours'
    ];

    protected $guarded = [];
}
