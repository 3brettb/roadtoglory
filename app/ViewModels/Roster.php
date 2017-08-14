<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Week;
use App\Models\Roster as RosterModel;
use App\Managers\RosterManager;

class Roster extends Model
{

    public $roster;

    public $players;

    public $team;

    public $week;

    public $slots;

    public $hasPlayers;

    public function __construct(Team $team, Week $week = null)
    {
        $this->team = $team;
        $this->week = ($week != null) ? $week : current_week(); 
        $this->players = $team->players;
        $this->init($team);
    }

    public function getStarterAttribute()
    {
        return $this->slots->starter;
    }

    public function getBenchAttribute()
    {
        return $this->slots->bench->sortBy('place');
    }

    public function getIrAttribute()
    {
        return $this->slots->ir;
    }

    public function init($team)
    {
        $this->updateRoster($team);
        $this->getSlots();
        $this->roster->load('players');
        $this->place();
    }

    private function updateRoster($team)
    {
        if($team->roster) {
            $this->roster = RosterManager::update($team->roster);
            $this->hasPlayers = true;
        }
        else {
            $this->hasPlayers = false;
        }
    }

    private function getSlots()
    {
        $this->slots = new RosterSlots();
    }

    private function place()
    {
        if($this->hasPlayers)
        {
            foreach($this->roster->players as $player)
            {
                $this->slots->addPlayer($player);
            }
        }
    }

}