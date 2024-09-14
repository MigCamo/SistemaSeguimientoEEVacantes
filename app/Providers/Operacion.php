<?php

namespace App\Providers;

use App\Providers\OperacionHorasVacante;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Models\Zona_Dependencia_Programa;


class Operacion
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
     * @param  \App\Providers\OperacionHorasVacante  $event
     * @return void
     */
    public function handle(OperacionHorasVacante $event)
    {
        //dd($event->tipoContratacion);
        if( $event->tipoContratacion == "IPP"){

            $horasInicialesEE = DB::table('zona__dependencia__programas')
                ->select('horasDisponibles')
                ->where('clave_programa','=',$event->numPrograma)
                ->value('horasDisponibles')
            ;

            $programaID = DB::table('zona__dependencia__programas')
                ->select('id')
                ->where('clave_programa','=',$event->numPrograma)
                ->value('id')
            ;

            $horasDisponibles =  $horasInicialesEE - $event->horasEE;

            $zonaDependenciaProg = Zona_Dependencia_Programa::findOrFail($programaID);
            $zonaDependenciaProg->update([
                'horasDisponibles' => $horasDisponibles,
            ]);


        }elseif (
            $event->tipoContratacion == "IOD" && $event->tipoAsignacion !== "Complemento de carga" &&
            $event->tipoContratacion == "IOD" && $event->tipoAsignacion !== "Carga obligatoria"
        ){

            $horasInicialesEE = DB::table('zona__dependencia__programas')
                ->select('horasDisponibles')
                ->where('clave_programa','=',$event->numPrograma)
                ->value('horasDisponibles')
            ;

            $programaID = DB::table('zona__dependencia__programas')
                ->select('id')
                ->where('clave_programa','=',$event->numPrograma)
                ->value('id')
            ;

            $horasDisponibles =  $horasInicialesEE - $event->horasEE;

            $zonaDependenciaProg = Zona_Dependencia_Programa::findOrFail($programaID);
            $zonaDependenciaProg->update([
                'horasDisponibles' => $horasDisponibles,
            ]);


        }

    }
}
