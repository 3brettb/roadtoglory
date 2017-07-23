<?php

namespace App\Http\ViewComposers\League;

use Illuminate\View\View;

use App\Models\Team;
use App\Models\WeekStanding;
use App\Helpers\DataObject;

class Rankings
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
        $view->with('rankings', $this->rankings);
    }

    private function init(){
        $this->rankings = $this->getRankings();
    }

    private function getRankings(){
        $rankings = DataObject::WeekRankings();
        return $rankings;
    }
}