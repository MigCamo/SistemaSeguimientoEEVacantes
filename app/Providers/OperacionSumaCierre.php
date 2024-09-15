<?php

namespace App\Providers;

use App\Models\Zona_Dependencia_Programa;
use App\Providers\OperacionCierreVacante;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class OperacionSumaCierre
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\OperacionCierreVacante  $event
     * @return void
     */
    public function handle(OperacionCierreVacante $event)
    {
        //
        if ($event->numMotivo == 1){

            $horasDisponiblesIniciales = DB::table
            ('zona__dependencia__programas')
                ->select('horasDisponibles')
                ->where('clave_programa','=',$event->numPrograma)
                ->value('horasDisponibles');

            $programaID = DB::table('zona__dependencia__programas')
                ->select('id')
                ->where('clave_programa','=',$event->numPrograma)
                ->value('id')
            ;

            $horasDisponibles = $horasDisponiblesIniciales + $event->numHoras;

            $zonaDependenciaProg = Zona_Dependencia_Programa::findOrFail($programaID);
            $zonaDependenciaProg->update(['horasDisponibles' => $horasDisponibles]);
        }
    }
}
