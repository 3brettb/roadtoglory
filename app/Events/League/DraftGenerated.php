<?php

namespace App\Events\League;

use App\Models\Draft;
use Illuminate\Queue\SerializesModels;

class DraftGenerated
{
    use SerializesModels;

    public $draft;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct($draft)
    {
        $this->draft = $draft;
    }
}