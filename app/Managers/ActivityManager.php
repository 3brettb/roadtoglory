<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class ActivityManager extends Manager
{
    static function store(Request $request){
        
    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        ActivityRepository::destroy($id);
    }

    static function find($id){
        return ActivityRepository::find($id);
    }

    static function all(){
        return ActivityRepository::all()->where('league_id', LeagueHelper::active()->id)->get();
    }
}