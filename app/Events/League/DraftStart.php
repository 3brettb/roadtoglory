<?php

namespace App\Events\League;

use App\Models\Draft;
use Illuminate\Queue\SerializesModels;

class DraftStart
{
    use SerializesModels;

    public $draft;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Draft $draft)
    {
        $this->draft = $draft;
    }
}