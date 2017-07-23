<?php

namespace App\Events\League;

use App\Models\Season;
use Illuminate\Queue\SerializesModels;

class NewSeason
{
    use SerializesModels;

    public $season;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Season $season)
    {
        $this->season = $season;
    }
}