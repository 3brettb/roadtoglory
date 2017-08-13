<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Models\Roster;
use App\Models\Pivots\RosterPlayer;
use App\Models\Team;

class RosterManager extends Manager
{
    static function update(Roster $roster)
    {
        if($roster->week == current_week())
        {
            $roster->load(['team', 'team.players', 'players']);
            $players = $roster->team->players;
            foreach($roster->players as $player)
            {
                if(!contained_in_ids($players, $player))
                {
                    $roster->players()->detach($player);
                }
            }
            foreach($players as $player)
            {
                if(!contained_in_ids($roster->players, $player))
                {
                    $roster->players()->attach($player, [
                        'position_id' => 10,
                    ]);
                }
            }
        }
        return $roster;
    }
}