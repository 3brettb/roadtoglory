<?php

namespace App\Models;

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
        'player_id', 'roster_id', 'week_stat_id', 'score',
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
        return $this->belongsTo(Player::class);
    }

    public function roster(){
        return $this->belongsTo(Roster::class);
    }

    public function stats(){
        return $this->hasManyThrough(Stat::class, WeekStat::class, 'id', 'week_stat_id', 'week_stat_id');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
