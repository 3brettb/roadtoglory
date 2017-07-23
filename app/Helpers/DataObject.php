<?php

namespace App\Helpers;

class DataObject 
{

    static function TeamStanding(){
        $self = collect();
        $self->rank = count(league()->teams)."/".count(league()->teams);
        $self->league = collect();
        $self->division = collect();
        $self->league->wins = 0;
        $self->league->losses = 0;
        $self->league->played = 0;
        $self->league->points = collect();
        $self->league->points->for = 0;
        $self->league->points->against = 0;
        $self->division->wins = 0;
        $self->division->losses = 0;
        $self->division->played = 0;
        $self->division->points = collect();
        $self->division->points->for = 0;
        $self->division->points->against = 0;
        return $self;
    }

    static function TeamWeeks(){
        $week = collect();
        $week->number = 0;
        $week->nflweek = 0;
        $week->result = "W";
        $week->matchup = collect();
        $week->matchup->score = "0 - 0";
        $self = collect([$week]);
        return $self;
    }

    static function TeamRoster(){
        $slots = self::createSlots();
        $players = array();
        foreach($slots as $slot){
            $player = collect();
            $player->slot = $slot;
            $player->exists = false;
            $player->projected = collect();
            array_push($players, $player);
        }
        $roster = collect();
        $roster->starter = $players;
        $roster->bench = [];
        $roster->ir = [];
        return $roster;
    }

    static function createSlots(){
        $slots = [
            "QB" => ['name' => "QB", 'requirements' => 'QB'], 
            "WR1" => ['name' => "WR1", 'requirements' => 'WR'], 
            "WR2" => ['name' => "WR2", 'requirements' => 'WR'],
            "RB/WR" => ['name' => "RB/WR", 'requirements' => 'RB,WR'], 
            "TE/WR" => ['name' => "TE/WR", 'requirements' => 'TE,WR'],
            'FLEX' => ['name' => "FLEX", 'requirements' => 'RB,WR,TE'],
            'K' => ['name' => "K", 'requirements' => 'K'],
            'D/ST' => ['name' => "D/ST", 'requirements' => 'D/ST'],
        ];
        $temp = array();
        foreach($slots as $key => $slot){
            $temp[$key] = collect();
            $temp[$key]->name = $slot['name'];
            $temp[$key]->requirements = $slot['requirements'];
        }
        return collect($temp);
    }

    static function ScheduleMatchups(){
        $matchups = array();
        return collect($matchups);
    }

    static function WeekRankings(){
        $teams = league()->teams;
        $arr = array();
        foreach($teams as $key => $team){
            $temp = collect();
            $temp->team = $team;
            $temp->team->record = "1-0";
            $temp->rank = collect();
            $temp->rank->current = $key+1;
            $temp->rank->last = $key;
            $temp->change = collect();
            $temp->change->value = $temp->rank->last - $temp->rank->current;
            $temp->change->icon = "fa fa-arrows-h";
            $temp->comments = "Some Comments here about the team and the ranking. Some Comments here about the teaSome Comments here aboutSome Comments here about the teSome Comments here about the team and the ranking.am and the ranking. the team and the ranking.m and the ranking.";
            array_push($arr, $temp);
        }
        $rankings = collect($arr);
        $rankings->week = \App\Models\Week::find(1);
        $rankings->updated_at = \Carbon\Carbon::now();
        return $rankings;
    }

}