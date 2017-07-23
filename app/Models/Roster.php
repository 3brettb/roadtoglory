<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

}
