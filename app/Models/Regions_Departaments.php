<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions_Departaments extends Model
{
    use HasFactory;
    protected $table = 'regions_departaments';
    protected $fillable = [
        'id',
        'region_code',
        'departament_code',
    ];

    protected $guarded = [];
}
