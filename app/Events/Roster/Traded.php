<?php

namespace App\Events\Roster;

use App\Models\Roster;
use App\Models\RosterPlayer;
use App\Models\Player;
use Illuminate\Queue\SerializesModels;

class Traded
{
    use SerializesModels;

    public $player;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Player $player)
    {
        $this->player = $player;
    }
}