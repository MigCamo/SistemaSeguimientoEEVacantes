<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions_Departament_Programs extends Model
{
    use HasFactory;
    protected $table = 'regions_educational_programs';
    protected $fillable = [
        'id',
        'region_code',
        'departament_code',
        'educational_program_code',
    ];

    protected $guarded = [];
}
