<?php

namespace App\Http\ViewComposers\Trade;

use Illuminate\View\View;
use App\Helpers\DataObject;

use App\Models\Trade;
use App\Models\Team;
use App\Models\RosterPlayer;
use App\Models\DraftPick;

class Create
{

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('teams', $this->teams);
    }

    private function init(){
        $this->teams = $this->getTeams();
    }

    private function getTeams(){
        if(request()->teams){
            $teams = Team::findMany(array_values(request()->teams));
            $teams->push(team());
            $this->processItems($teams);
            return $teams;
        }
        return [];
    }

    private function processItems(&$teams){
        $templist = explode('|', request()->items);
        $temparray = array();
        foreach($teams as $team){
            $temparray[$team->id] = array();
        }
        foreach($templist as $temp){
            $temp = explode(',', $temp);
            $item = new \stdClass();
            $item->team = Team::find($temp[0]);
            $item->reference = $this->resolveType($temp[1], $temp[2]);
            array_push($temparray[$item->reference->getTeamID()], $item);
        }
        foreach($temparray as $key => $arr){
            $teams->find($key)->items = $arr;
        }
    }

    private function resolveType($key, $val){
        switch($key){
            case '1':
                return RosterPlayer::find($val);
            case '2':
                return DraftPick::find($val);
        }
    }

    //[team_id, type, id]

}