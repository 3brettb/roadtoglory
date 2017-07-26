<?php

namespace App\Http\Controllers\Action;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Team;

class TradeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function items(Request $request){
        $out = array();
        if(isset($request->team)){
            $team = Team::with(['picks', 'players'])->where('id', $request->team)->first();
            //$team->load(['picks', 'players']);
            foreach($team->players as $player){
                $player->type = "player";
                $player->string = $player->toString();
                array_push($out, $player);
            }
            foreach($team->picks as $pick){
                $pick->type = "pick";
                $pick->string = $pick->toString();
                array_push($out, $pick);
            }
        }
        else {
            array_push($out, ['error' => 'Team not selected']);
        }
        return $out;
    }
}