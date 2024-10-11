<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAsignation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type_asignation',
        'description',
    ];

    protected $guarded = [];
}
