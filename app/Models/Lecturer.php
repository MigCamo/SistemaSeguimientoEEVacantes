<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $primaryKey = 'staff_number';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'staff_number',
        'names',
        'lastname',
        'maternal_surname',
        'email',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];
}
