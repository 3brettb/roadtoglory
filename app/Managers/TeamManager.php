<?php

namespace App\Managers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\Matchup;
use App\ViewModels\Matchup as MatchupViewModel;
use App\ViewModels\Standing as StandingViewModel;

class TeamManager extends Manager
{
    static function display($team, $format){
        $string = $format;
        $string = str_replace('{N}', $team->name, $string);
        $string = str_replace('{M}', $team->mascot, $string);
        return $string;
    }

    static function store(Request $request){

    }

    static function update($id, Request $request){

    }

    static function destroy($id){

    }

    static function find($id){

    }

    static function all(){
        
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