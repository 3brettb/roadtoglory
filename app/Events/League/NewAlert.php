<?php

namespace App\Events\League;

use App\Models\Alert;
use Illuminate\Queue\SerializesModels;

class NewAlert
{
    use SerializesModels;

    public $alert;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Alert $alert)
    {
        $this->alert = $alert;
    }
}