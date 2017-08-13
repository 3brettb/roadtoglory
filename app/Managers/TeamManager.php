<?php

namespace App\Managers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\Matchup;
use App\Models\Pivots\RosterPlayer;
use App\ViewModels\Matchup as MatchupViewModel;
use App\ViewModels\Standing as StandingViewModel;
use App\ViewModels\Roster as RosterViewModel;
use App\Helpers\ResponseObject;

class TeamManager extends Manager
{
    static function display($team, $format)
    {
        $string = $format;
        $string = str_replace('{N}', $team->name, $string);
        $string = str_replace('{M}', $team->mascot, $string);
        return $string;
    }

    static function store(Request $request)
    {

    }

    static function update(Request $request)
    {
        try{
            $positions = array();
            foreach($request->list as $item)
            {
                if($item['playerid'] != null)
                {
                    $rp = RosterPlayer::where('player_id', $item['playerid'])->where('roster_id', $request->rosterid)->first();
                    if(!isset($positions[$item['pid']])) $positions[$item['pid']] = 1;
                    $place = $positions[$item['pid']]++;
                    $rp->update([
                        'place' => $place,
                        'position_id' => $item['pid'],
                    ]);
                }
            }
        } catch (Exception $e) {
            $response = new ResponseObject("There was an error saving your roster. Please Try again.", ['error' => $e]);
            return $response->get();
        }
        $response = new ResponseObject("Roster Updated");
        return $response->get();
    }

    static function destroy($id)
    {

    }

    static function find($id)
    {

    }

    static function all()
    {
        
    }

    static function standing(Team $team)
    {
        $standing = new \stdClass();
        $standing->league = new StandingViewModel($team);
        $standing->division = new StandingViewModel($team);

        $matchups = $team->matchups()->where('season_id', season()->id)->get();
        foreach($matchups as $matchup)
        {
            $matchup = new MatchupViewModel($matchup);
            $standing->league->addMatchup($matchup);
            if($matchup->division) $standing->division->addMatchup($matchup);
        }
        $standing->matchups = $standing->league->matchups;
        return $standing;
    }
}