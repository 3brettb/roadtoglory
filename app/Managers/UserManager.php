<?php

namespace App\Managers;

use Illuminate\Http\Request;

class UserManager extends Manager
{
    static function display($user, $format){
        $string = $format;
        $string = str_replace('{F}', $user->firstname, $string);
        $string = str_replace('{L}', $user->lastname, $string);
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

    static function profile($id){
        
    }
}