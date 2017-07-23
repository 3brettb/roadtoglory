<?php

namespace App\Http\ViewComposers\League;

use Illuminate\View\View;

use App\Models\Team;

class Standings
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
        $view->with('divisions', $this->divisions);
    }

    private function init(){
        $this->teams = $this->getTeams();
        $this->divisions = $this->getDivisions();
    }

    private function getTeams(){
        $teams = league()->teams;
        return $teams;
    }

    private function getDivisions(){
        $divisions = league()->divisions;
        return $divisions;
    }
}