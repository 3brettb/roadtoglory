<?php

namespace App\Events\League;

use App\Models\Message;
use Illuminate\Queue\SerializesModels;

class NewMessage
{
    use SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
}