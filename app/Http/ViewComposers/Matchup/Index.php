<?php

namespace App\Http\ViewComposers\Matchup;

use Illuminate\View\View;
use App\Helpers\DataObject;

use App\Models\Matchup;

class Index
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
        $view->with('matchups', $this->matchups);
        $view->with('weeks', $this->weeks);
        $view->with('seasons', $this->seasons);
        $view->with('teams', $this->teams);
    }

    private function init(){
        $this->matchups = $this->getMatchups();
        $this->weeks = $this->getWeeks();
        $this->seasons = $this->getSeasons();
        $this->teams = $this->getTeams();
    }

    private function getMatchups(){
        $matchups = DataObject::ScheduleMatchups();
        return $matchups;
    }

    private function getWeeks(){
        return [];
    }

    private function getSeasons(){
        return [];
    } 

    private function getTeams(){
        return league()->teams->pluck('select_name', 'id');
    }

}