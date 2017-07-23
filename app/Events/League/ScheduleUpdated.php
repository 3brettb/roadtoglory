<?php

namespace App\Events\League;

use App\Models\Matchup;
use Illuminate\Queue\SerializesModels;

class ScheduleUpdated
{
    use SerializesModels;

    public $matchups;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct($array)
    {
        $this->matchups = $array;
    }
}