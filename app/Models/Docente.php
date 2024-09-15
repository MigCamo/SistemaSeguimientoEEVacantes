<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    //https://laravel.com/docs/9.x/eloquent#primary-keys
    //protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nPersonal',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
    ];

    protected $guarded = [];
}
