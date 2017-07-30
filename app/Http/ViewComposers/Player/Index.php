<?php

namespace App\Http\ViewComposers\Player;

use Illuminate\View\View;

use App\Models\Player;
use App\Models\Resource\Players\PlayerData as SystemPlayer;

class Index
{

    private $model;

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
        $view->with('model', $this->model());
    }

    private function model()
    {
        $this->model->players = $this->getPlayers();
        return $this->model;
    }

    private function getPlayers()
    {
        $players = SystemPlayer::all();
        return $players;
    }
}