<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class EventManager extends Manager
{
    static function store(Request $request){

    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        EventRepository::destroy($id);
    }

    static function find($id){
        return EventRepository::find($id);
    }

    static function all(){
        return EventRepository::all()->where('league_id', LeagueHelper::active()->id)->get();
    }
}