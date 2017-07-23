<?php

namespace App\Http\ViewComposers\Team;

use Illuminate\View\View;
use App\Helpers\DataObject;

use App\Models\Team;

class Show
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
        $view->with('standing', $this->standing);
        $view->with('weeks', $this->weeks);
        $view->with('roster', $this->roster);
    }

    private function init(){
        $this->standing = $this->getStanding();
        $this->weeks = $this->getWeeks();
        $this->roster = $this->getRoster();
    }

    private function getStanding(){
        $standing = DataObject::TeamStanding();
        return $standing;
    }

    private function getWeeks(){
        $weeks = DataObject::TeamWeeks();
        return $weeks;
    }

    private function getRoster(){
        $roster = DataObject::TeamRoster();
        return $roster;
    }

}