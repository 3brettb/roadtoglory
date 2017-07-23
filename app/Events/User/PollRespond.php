<?php

namespace App\Events\User;

use App\Models\PollResponse;
use Illuminate\Queue\SerializesModels;

class PollRespond
{
    use SerializesModels;

    public $response;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(PollResponse $response)
    {
        $this->response = $response;
    }
}