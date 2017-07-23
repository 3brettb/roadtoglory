<?php

namespace App\Events\User;

use App\Models\RequestUpdate;
use App\Models\Request;
use Illuminate\Queue\SerializesModels;

class UpdateRequest
{
    use SerializesModels;

    public $update;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(RequestUpdate $update)
    {
        $this->update = $update;
    }
}