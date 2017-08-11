<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Resource\Players\Player as SystemPlayer;

class Roster extends Model
{
    protected $table = 'rosters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'week_id',
    ];

    public function routeto(){
        return $this->team->routeto();
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function week(){
        return $this->belongsTo(Week::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

    public function players(){
        return $this->belongsToMany(SystemPlayer::class, env('ROADTOGLORY_DATABASE').'.roster_players', 'roster_id', 'player_id')
            ->withPivot('position_id', 'score', 'place', 'week_stat_id', 'id')
            ->using(RosterPlayer::class);
    }

}
