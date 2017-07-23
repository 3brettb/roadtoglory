<?php

namespace App\Events\League;

use App\Models\Event;
use Illuminate\Queue\SerializesModels;

class RemovedEvent
{
    use SerializesModels;

    public $event;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Draft $event)
    {
        $this->event = $event;
    }
}