<?php

namespace App\Events\Trade;

use App\Models\Trade;
use Illuminate\Queue\SerializesModels;

class Accepted
{
    use SerializesModels;

    public $trade;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Trade $trade)
    {
        $this->trade = $trade;
    }
}