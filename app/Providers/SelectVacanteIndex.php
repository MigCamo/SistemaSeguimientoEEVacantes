<?php

namespace App\Providers;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SelectVacanteIndex
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id_user;
    public $id_zona;
    public $clave_dependencia;
    public $clave_programa;
    public $filtro;
    public $busqueda;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id_user,$id_zona,$clave_dependencia,$clave_programa,$filtro,$busqueda)
    {
        $this->id_user =$id_user;
        $this->id_zona =$id_zona;
        $this->clave_dependencia =$clave_dependencia;
        $this->clave_programa =$clave_programa;
        $this->filtro =$filtro;
        $this->busqueda =$busqueda;
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
