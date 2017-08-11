<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

use App\Models\Position;
use App\Models\Resource\Players\Player as SystemPlayer;

class RosterSlot extends Model
{

    public $player;

    public $position;

    public $place;

    public $name;

    public function __construct(Position $position, $place, SystemPlayer $player = null)
    {
        $this->player = $player;
        $this->position = $position;
        $this->place = $place;
        $this->init();
    }

    public function getRequirementsAttribute()
    {
        return $this->position->requirements;
    }

    private function init()
    {
        $this->name = $this->position->name;
    }

    public function hasPlayer()
    {
        return $this->player != null;
    }

    public function setPlayer(SystemPlayer $player)
    {
        $this->player = $player;
    }

}