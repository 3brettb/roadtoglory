<?php

namespace App\Managers;

use Illuminate\Http\Request;

use App\Models\Trade;
use App\Models\DraftPick;
use App\Models\Team;
use App\Helpers\ResponseObject;

class TradeManager extends Manager
{
    static function store(Request $request)
    {
        try{
            $trade = team()->sent_trades()->create([
                'closes' => \Carbon\Carbon::parse("+ 3 days")
            ]);
            $trade_data = json_decode($request->trade);
            foreach($trade_data->teams as $data)
            {
                if($data->team->id == team()->id)
                {
                    $trade->teams()->attach(Team::find($data->team->id), ['accept' => 1]);
                }
                else
                {
                    $trade->teams()->attach(Team::find($data->team->id));
                }
                foreach($data->items as $item)
                {
                    switch($item->type)
                    {
                        case "pick":
                            $trade->picks()->attach(DraftPick::find($item->id), [
                                'team_id' => $item->to->id
                            ]);
                            break;
                        case "player":
                            $trade->players()->attach(Player::find($item->id), [
                                'team_id' => $item->to->id
                            ]);
                            break;
                    }
                }
            }
        } catch (Exception $e) {
            if($trade){ $trade->delete(); }
            $response = new ResponseObject("There was an error submitting your trade. Please Try again.", ['error' => $e]);
            return $response->get();
        }
        $response = new ResponseObject("Trade sent successfully.", ['redirect' => route('trade.index')]);
        return $response->get();
    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        Trade::find($id)->delete();
        $response = new ResponseObject("Trade has been revoked.", ['redirect' => route('trade.index')]);
    }

    static function find($id){

    }

    static function all(){
        
    }

    static function accept(Trade $trade)
    {
        $trade->teams()->updateExistingPivot(team()->id, ['accept' => 1]);
        self::update_trade_accepted($trade);
        $response = new ResponseObject("You have accepted this trade offer.", ['redirect' => route('trade.show', [$trade])]);
        return $response->get();
    }

    static function reject(Trade $trade)
    {
        $ids = array_values($trade->teams()->pluck('tradeable_id')->toArray());
        $trade->teams()->updateExistingPivot($ids, ['accept' => 0]);
        self::update_trade_accepted($trade, true);
        $response = new ResponseObject("You have rejected this trade offer.", ['redirect' => route('trade.index')]);
        return $response->get();
    }

    static function items(Request $request)
    {
        $out = array();
        if(isset($request->team))
        {
            $team = Team::with(['picks', 'players'])->where('id', $request->team)->first();
            
            foreach($team->players as $player)
            {
                $player->type = "player";
                $player->string = $player->toString();
                array_push($out, $player);
            }
            foreach($team->picks as $pick)
            {
                $pick->type = "pick";
                $pick->string = $pick->toString();
                array_push($out, $pick);
            }
        } 
        return $out;
    }

    private static function update_trade_accepted($trade, $reject = false)
    {   
        if($reject == false)
        {
            $accept_query = $trade->teams()->wherePivot('accept', 1)->count();
            $reject_query = $trade->teams()->wherePivot('accept', 0)->count();
            
            $accepted = ($accept_query < $trade->teams()->count()) ? false : true;
            $rejected = ($reject_query > 0) ? true : false;

            $value = 0;
            if(!$rejected)
            {
                $value = ($accepted) ? 1 : null;
            }
            
            return self::set_trade_status($trade, $value);
        }
        return self::set_trade_status($trade, 0);
    }

    private static function set_trade_status($trade, $accept, $approve = null)
    {
        $trade->update(['accepted' => $accept, 'approved' => $approve]);
    }
}