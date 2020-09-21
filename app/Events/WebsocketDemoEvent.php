<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WebsocketDemoEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $somedata;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($somedata)
    {
        $this->somedata = $somedata;
    }

    //aqui va la condicion, se debe retornar un true para que pase el canal
    public function broadcastWhen()
    {
        return $this->somedata === 'hola';
    }

    // aqui vamos a poner lo que queremos que nos retorne el canal
    public function broadcastWith()
    {
        return ['somedata' => $this->somedata];
    }

    /**
     * Get the channels the event should broadcast on.
     *  Nombre del canal
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('DemoChannel');
    }
}
