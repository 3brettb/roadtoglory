<?php

namespace App\Http\ViewComposers\Player;

use Illuminate\View\View;

use App\Models\Player;

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
        //$view->with('players', $this->players);
    }

    private function init(){
        //$this->teams = $this->getPlayers();
    }
}