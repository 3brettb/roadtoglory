<?php

namespace App\Events\League;

use App\Models\Matchup;
use Illuminate\Queue\SerializesModels;

class GameFinish
{
    use SerializesModels;

    public $game;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Matchup $game)
    {
        $this->game = $game;
    }
}