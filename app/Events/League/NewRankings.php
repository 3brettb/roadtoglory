<?php

namespace App\Events\League;

use App\Models\WeekStanding;
use Illuminate\Queue\SerializesModels;

class NewRankings
{
    use SerializesModels;

    public $rankings;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct($array)
    {
        $this->rankings = $array;
    }
}