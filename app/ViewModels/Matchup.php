<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Matchup as MatchupModel;
use App\Models\Team;

class Matchup extends Model
{

    public $complete;

    public $winners = array();

    public $losers = array();

    public $team;

    public $hasTeam;

    private $model;

    private $totalPoints;

    public function __construct(MatchupModel $model)
    {
        $this->init();
        $this->model = $model->load(['week', 'season', 'league', 'type', 'teams']);
        $this->complete = !($model->teams()->whereNull('matchup_teams.win')->count() > 0);
        $this->hasTeam($model);
        $this->parse($model);
    }

    private function init()
    {
        $this->teams = array();
        $this->week = null;
        $this->season = null;
        $this->league = null;
        $this->type = null;
        $this->division = true;
    }

    private function parse($model)
    {
        $this->loadRelations();
        $division = null;
        $first = true;
        foreach($this->teams as $team)
        {
            $team = $this->parseMatchupTeam($team);
            
            if($first) $division = $team->division->id;
            else if($division != $team->division->id) $this->division = false;
            
            if($this->hasTeam && $team->id == $this->team->id)
                $this->team = $team;
            $first = false;
        }
        if($this->complete)
        {
            foreach($this->teams as $team){
                if($team->win) array_push($this->winners, $team);
                else array_push($this->losers, $team);
                $team->points->setAgainst($this->totalPoints - $team->points->for);
            }
        }
    }

    private function hasTeam($model)
    {
        $this->hasTeam = isset($model->pivot) && isset($model->pivot->team_id);
        if($this->hasTeam) $this->team = Team::find($model->pivot->team_id);
    }

    private function loadRelations()
    {
        $this->week = $this->model->week;
        $this->season = $this->model->season;
        $this->league = $this->model->league;
        $this->type = $this->model->type;
        $this->teams = $this->model->teams;
    }

    private function parseMatchupTeam($team)
    {
        $this->getDefaultTeam($team);
        if($this->complete){
            $this->totalPoints += $team->pivot->score;
            $team->points->setFor($team->pivot->score);
            $team->win = ($team->pivot->win == 1) ? true : false;
            $team->status = ($team->win) ? "W" : "L";
            $team->played = 1;
        }
        return $team;
    }

    private function getDefaultTeam(&$team)
    {
        $team->points = new Points();
        $team->played = 0;
        $team->win = null;
        $team->status = "-";
    }

    public function getWinnerAttribute()
    {
        return (sizeof($this->winners) > 0) ? $this->winners[0] : null;
    }

    public function getLoserAttribute()
    {
        return (sizeof($this->losers) > 0) ? $this->losers[0] : null;
    }

}