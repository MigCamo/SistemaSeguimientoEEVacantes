<?php

namespace App\Providers;

use App\Providers\SelectVacanteIndex;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\SearchVacante;
class SearchVacanteIndex
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
     * @param  \App\Providers\SelectVacanteIndex  $event
     * @return void
     */
    public function handle(SelectVacanteIndex $event)
    {

        $current_timestamp = now();
        $user = $event->id_user;
        $zona = $event->id_zona;
        $dependencia = $event->clave_dependencia;
        $programa = $event->clave_programa;
        $filtro = $event->filtro;
        $busqueda = $event->busqueda;

        $saveSearch = SearchVacante::updateOrCreate(
            ['id_user'=>$user],
            [
             /*'id_user'=>$user,*/
             'id_zona'=>$zona,
             'clave_dependencia'=>$dependencia,
             'clave_programa'=>$programa,
             'filtro'=>$filtro,
             'busqueda'=>$busqueda,
             'created_at' => $current_timestamp,
             'updated_at' => $current_timestamp,
            ]
        );
        return $saveSearch;
    }
}
