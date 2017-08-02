<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Standing extends Model
{

    public $wins;

    public $losses;

    public $points;

    public $played;

    public $matchups;

    public $team;

    public function __construct(Team $team)
    {
        $this->wins = 0;
        $this->losses = 0;
        $this->team = $team;
        $this->points = new Points();
        $this->matchups = array();
    }

    public function addMatchup(Matchup $matchup)
    {
        array_push($this->matchups, $matchup);
        if($matchup->complete && $matchup->hasTeam){
            if($matchup->team->win) {
                $this->wins++;
                $this->points->addFor($matchup->team->points->for);
                $this->points->addAgainst($matchup->team->points->against);
            }
            else {
                $this->losses++;
                $this->points->addFor($matchup->team->points->for);
                $this->points->addAgainst($matchup->team->points->against);
            }
            $this->played++;
        }
    }

}