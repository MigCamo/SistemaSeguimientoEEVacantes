<?php

namespace App\Models;

use App\Jobs\ProcessCSVUploadVacamte;
use App\Jobs\ProcessCSVUploadVacante;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
 * Atributos que pueden asignarse
 *
 * @link https://laravel.com/docs/9.x/eloquent#mass-assignment
 */
class Vacante extends Model{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'periodo',
        'clavePeriodo',
        'numZona',
        'numDependencia',
        'numArea',
        'numPrograma',
        'numPlaza',
        'numHoras',
        'numMateria',
        'nombreMateria',
        'grupo',
        'subGrupo',
        'numMotivo',
        'tipoContratacion',
        'tipoAsignacion',
        'numPersonalDocente',
        'nombreDocente',
        'plan',
        'observaciones',
        'fechaAviso',
        'fechaAsignacion',
        'fechaApertura',
        'fechaCierre',
        'fechaRenuncia',
        'archivo',
    ];

    protected $guarded = [];

    /**
     * Función para cargar el archivo CSV
     *
     * @link https://youtu.be/ap7A1uav-tc
     * @return void
     */
    public function importToDB(){
        $path = resource_path('pending-files/*.csv');
        $files = glob($path);
        foreach ($files as $file){

            ProcessCSVUploadVacante::dispatch($file);

        }

    }


}
