<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WeekStanding extends Model
{
    protected $table = 'week_standings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'week_id', 'rank', 'description',
    ];

    public function routeto(){
        return url("/rankings/$this->week_id");
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
