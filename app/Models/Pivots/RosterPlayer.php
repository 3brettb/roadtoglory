<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RosterPlayer extends Model
{
    protected $table = 'roster_players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'roster_id', 'week_stat_id', 'score', 'position_id', 'place'
    ];

    public function toString(){
        return $this->player->toString();
    }

    public function getTeamID(){
        return $this->roster->team->id;
    }

    public function routeto(){
        return $this->roster->routeto();
    }

    public function player(){
        return $this->belongsTo(\App\Models\SystemPlayer::class);
    }

    public function roster(){
        return $this->belongsTo(\App\Models\Roster::class);
    }

    public function position(){
        return $this->belongsTo(\App\Models\Position::class);
    }

    public function stats(){
        return $this->hasManyThrough(\App\Models\Stat::class, \App\Models\WeekStat::class, 'id', 'week_stat_id', 'week_stat_id');
    }

    public function activity(){
        return $this->morphToMany(\App\Models\Activity::class, 'activityable');
    }

}
