<?php

namespace App\Http\ViewComposers\Player;

use Illuminate\View\View;

use App\Models\Team;
use App\Models\Player;
use App\Models\Resource\Players\Player as SystemPlayer;

class Move
{

    private $model;

    private $player;

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
        $this->player = $view->player;
        $view->with('model', $this->model());
    }

    private function model()
    {
        $this->model->player = $this->getPlayer();
        $this->model->roster = $this->getRoster();
        $this->model->message = $this->getMessage();
        return $this->model;
    }

    private function getPlayer()
    {
        $player = $this->player;
        $query = league()->players()->where('player_data_id', $player->id);
        $player->owned = ($query->count() > 0);
        if($player->owned) {
            $player = $query->first();
            $player->owner = Team::find($player->pivot->team_id);
        }
        $player->mine = ($query->where('team_id', team()->id)->count() > 0);
        return $player;
    }

    private function getRoster()
    {
        $roster = league()->players()->where('team_id', team()->id)->get();
        return $roster;
    }

    private function getMessage()
    {
        return "Click 'Add' To add this player. You may need to drop a player from your roster to maintain roster size requirements.";
    }
}