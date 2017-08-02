<?php

namespace App\Managers;

use Illuminate\Http\Request;

use App\Models\Resource\Players\Player as SystemPlayer;
use App\Models\Player as LeaguePlayer;
use App\Helpers\ResponseObject;

class PlayerManager extends Manager
{
    static function display($player, $format){
        $string = $format;
        $string = str_replace('{F}', $player->firstname, $string);
        $string = str_replace('{L}', $player->lastname, $string);
        $string = str_replace('{N}', $player->nflteam, $string);
        $string = str_replace('{P}', $player->position, $string);
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

    static function add(Request $request)
    {
        try {
            $player = SystemPlayer::find($request->player);
            $league_player = LeaguePlayer::create([
                'league_id' => league()->id,
                'player_data_id' => $player->id,
                'team_id' => team()->id,
            ]);
        } catch (Exception $e) {
            $response = new ResponseObject("There was an error completing this action. Please Try again.", ['error' => $e]);
            return $response->get();
        }
        $response = new ResponseObject("Action processed successfully.", ['redirect' => route('player.index')]);
        return $response->get();
    }
}