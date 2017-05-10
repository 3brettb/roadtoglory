<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'number', 'nflweek', 'week_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function type(){
        return $this->belongsTo(WeekType::class);
    }

    public function players(){
        return $this->hasMany(RosterPlayer::class);
    }
}
