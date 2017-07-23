<?php

namespace App\Managers;

use Illuminate\Http\Request;

class TeamManager extends Manager
{
    static function display($team, $format){
        $string = $format;
        $string = str_replace('{N}', $team->name, $string);
        $string = str_replace('{M}', $team->mascot, $string);
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
}