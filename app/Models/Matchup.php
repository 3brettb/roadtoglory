<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Matchup extends Model
{
    protected $table = 'matchups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'season_id', 'week_id', 'type_id',
    ];

    public function routeto(){
        return url("/matchup/$this->id");
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\MatchupType::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function week(){
        return $this->belongsTo(Week::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'matchup_teams', 'matchup_id', 'team_id')->withPivot(['score', 'win']);
    }

    public function polls(){
        return $this->morphMany(Poll::class, 'reference');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}