<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class DraftManager extends Manager
{
    static function store(Request $request){

    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        DraftRepository::destroy($id);
    }

    static function find($id){
        return DraftRepository::find($id);
    }

    static function all(){
        return DraftRepository::all()->where('league_id', LeagueHelper::active()->id)->get();
    }
}