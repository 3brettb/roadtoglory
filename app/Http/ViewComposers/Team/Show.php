<?php

namespace App\Http\ViewComposers\Team;

use Illuminate\View\View;
use App\Helpers\DataObject;

use App\Models\Team;
use App\ViewModels\Roster as RosterViewModel;

class Show
{

    private $model;

    private $team;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new \stdClass();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $this->team = $view->team;
        $this->team->load(['players', 'matchups']);
        $view->with('model', $this->model());
    }

    private function model(){
        $this->model->roster = $this->getRoster();
        $this->model->weeks = $this->getWeeks();
        $this->model->team = $this->getTeam();
        $this->model->standing = $this->getStanding();
        return $this->model;
    }

    private function getStanding(){
        $standing = $this->team->standing();
        return $standing;
    }

    private function getTeam(){
        $team = $this->team;
        return $team;
    }

    private function getWeeks(){
        $weeks = $this->team->matchups;
        return $weeks;
    }

    private function getRoster(){
        $roster = new RosterViewModel($this->team);
        return $roster;
    }

}