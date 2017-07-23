<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class DraftManager extends Manager
{
    static function display($pick, $format){
        $string = $format;
        $string = str_replace('{Y}', $pick->draft->season->year, $string);
        $string = str_replace('{R}', $pick->round, $string);
        return $string;
    }
}