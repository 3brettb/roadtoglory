<?php

namespace App\Events\League;

use App\Models\IREligible;
use App\Models\Player;
use Illuminate\Queue\SerializesModels;

class NewIRPlayer
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