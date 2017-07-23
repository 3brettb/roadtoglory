<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;
use App\Helpers\Models\UserHelper;

class LeagueManager extends Manager
{
    static function store(Request $request){

    }

    static function update(Request $request){

    }

    static function destroy($id){
        LeagueRepository::destroy($id);
    }

    static function find($id){
        return LeagueRepository::find($id);
    }

    static function all(){
        return UserRepository::user_leagues();
    }

    static function active(){
        return LeagueHelper::active();
    }

    static function settings(){
        return SettingRepository::all()->where('league_id', LeagueHelper::active()->id)->get();
    }

    static function users(){
        return LeagueRepository::users(LeagueHelper::active()->id);
    }
}