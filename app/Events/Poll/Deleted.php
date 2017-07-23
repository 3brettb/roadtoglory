<?php

namespace App\Events\Poll;

use App\Models\Poll;
use Illuminate\Queue\SerializesModels;

class Deleted
{
    use SerializesModels;

    public $poll;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Poll $poll)
    {
        $this->poll = $poll;
    }
}