<?php

namespace App\Events\League;

use App\Models\Request;
use Illuminate\Queue\SerializesModels;

class NewRequest
{
    use SerializesModels;

    public $request;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}