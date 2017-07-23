<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class ChatManager extends Manager
{
    static function store(Request $request){

    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        ChatRepository::destroy($id);
    }

    static function find($id){
        return ChatRepository::find($id);
    }

    static function all(){
        return ChatRepository::all()->where('league_id', LeagueHelper::active()->id)->get();
    }
}