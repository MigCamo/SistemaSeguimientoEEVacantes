<?php

namespace App\Providers;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RenunciaDocente
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $vacanteID;
    public $nPersonalDocente;
    public $docenteNombre;
    public $tipoAsignacion;
    public  $fechaAviso;
    public  $fechaAsignacion;
    public  $fechaRenuncia;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($vacanteID,$nPersonalDocente,$docenteNombre,$tipoAsignacion,$fechaAviso,$fechaAsignacion,$fechaRenuncia)
    {
        $this->vacanteID = $vacanteID;
        $this->nPersonalDocente = $nPersonalDocente;
        $this->docenteNombre = $docenteNombre;
        $this->tipoAsignacion = $tipoAsignacion;
        $this->fechaAviso = $fechaAviso;
        $this->fechaAsignacion = $fechaAsignacion;
        $this->fechaRenuncia = $fechaRenuncia;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
