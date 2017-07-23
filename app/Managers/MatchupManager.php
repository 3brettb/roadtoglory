<?php

namespace App\Managers;

use Illuminate\Http\Request;

class MatchupManager extends Manager
{
    static function store(Request $request){

    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        MatchupRepository::destroy($id);
    }

    static function find($id){
        return MatchupRepository::find($id);
    }

    static function all(){
        return MatchupRepository::season();
    }
}