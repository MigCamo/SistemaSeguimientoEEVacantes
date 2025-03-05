<?php

namespace App\Models;

use App\Jobs\ProcessCSVUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'name',
        'concept',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];
}
