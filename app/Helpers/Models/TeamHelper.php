<?php

namespace App\Helpers\Models;

use App\Models\Team;

class TeamHelper
{
    static function active(){
        return Team::where('id', user()->team_id)->firstOrDefault();    
    }
}