<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Division extends Model
{
    protected $table = 'divisions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'season_id',
    ];

    public function routeto(){
        return $this->league->routeto();
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function league(){
        return $this->season->league;
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'division_teams', 'division_id', 'team_id');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
