<?php

namespace App\Managers;

use Illuminate\Http\Request;

class PermissionManager extends Manager
{
    static function update(Request $request){

    }

    /*
     * This is where permissions are decoded. 
     *
     * Permissions are listed in top-down/left-right fashion
     * ---------------------------------------------------------
     * 1 - 
     */
    static function check(User $user, $action){

    }

    private function decode($permission){

    }

    private function encode($permission_array){
        
    }
}