<?php

namespace App\Helpers\Models;

use App\Models\League;

class LeagueHelper
{
    static function active(){
        return League::where('id', team()->league_id)->firstOrFail();  
    }
}