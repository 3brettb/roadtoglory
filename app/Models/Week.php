<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Week extends Model
{
    protected $table = 'weeks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nflweek', 'number', 'season_id', 'type_id',
    ];

    public function routeto(){
        return url("/weeks/$this->id");
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\WeekType::class);
    }

    public function rosters(){
        return $this->hasMany(Roster::class);
    }

    public function rankings(){
        return $this->belongsToMany(Team::class, 'week_standings', 'week_id', 'team_id');
    }

    public function matchups(){
        return $this->hasMany(Matchup::class);
    }

    public function waiver_orders(){
        return $this->hasMany(WaiverOrder::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
