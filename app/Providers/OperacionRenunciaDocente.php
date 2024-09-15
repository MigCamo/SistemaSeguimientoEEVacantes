<?php

namespace App\Providers;

use App\Models\HistoricoDocente;
use App\Providers\RenunciaDocente;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class OperacionRenunciaDocente
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
     * @param  \App\Providers\RenunciaDocente  $event
     * @return void
     */
    public function handle(RenunciaDocente $event)
    {
        $current_timestamp = now();
        $saveActivity = DB::table('historico_docentes')
            ->insert([
                'vacanteID' => $event->vacanteID,
                'nPersonal' => $event->nPersonalDocente,
                'nombreDocente' => $event->docenteNombre,
                'tipoAsignacion' => $event->tipoAsignacion,
                'fechaAviso' => $event->fechaAviso,
                'fechaAsignacion' => $event->fechaAsignacion ,
                'fechaRenuncia' => $event->fechaRenuncia,
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ]);
        return $saveActivity;
    }
}
