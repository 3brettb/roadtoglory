<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class AlertManager extends Manager
{
    static function store(Request $request){

    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        AlertRepository::destroy($id);
    }

    static function find($id){
        return AlertRepository::find($id);
    }

    static function all(){
        return AlertRepository::all()->where('league_id', LeagueHelper::active()->id)->get();
    }
}