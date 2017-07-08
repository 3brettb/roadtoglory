<?php 

namespace App\Managers;

use \App\ResourceModels\Players\Player;
use \App\Team;
use \App\RosterPlayer;

class PlayerManager
{

    private static $all = null;

    private static $team = null;

    private static $available = null;

    private static $ireligible = null;

    private static $onroster = null;

    public static function all(){
        if($all == null) $all = Player::all();
        return $all;
    }

    public static function team($team_id){
        if($team == null) $team = new \stdClass();
        if(!isset($team->{$id})){
            $temp_team = collect();
            // Set variable to all players on given team
        }
        return $team->{$id};
    }

    public static function available($team_id){
        if($available == null){
        // Set variable to all players not on rosters    
        }
        return $available;
    }

    public static function ireligible(){
        if($ireligible == null){
        // Set variable to all players that are ireligible    
        }
        return $ireligible;
    }

    public static function onroster($team_id){
        if($onroster == null){
            // Set variable to all players on roster    
        }
        return $onroster;
    }

}