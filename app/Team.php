<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ResourceModels\Players\Player;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mascot', 'user_id', 'league_id', 'picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function roster_players(){
        return $this->hasMany(RosterPlayer::class);
    }

    public function roster($weekid = null){
        $weekid = ($weekid) ? $weekid : current_week();
        return $this->roster_players()->where('week_id', $weekid);
    }

    public function starter($weekid = null){
        $weekid = ($weekid) ? $weekid : current_week();
        return $this->roster_players()->where('week_id', $weekid)->where('starter', 1);
    }

    public function bench($weekid = null){
        $weekid = ($weekid) ? $weekid : current_week();
        return $this->roster_players()->where('week_id', $weekid)->where('starter', 0)->where('slot', '>', 0)->orderBy('slot', 'ASC');
    }

    public function ir($weekid = null){
        $weekid = ($weekid) ? $weekid : current_week();
        return $this->roster_players()->where('week_id', $weekid)->where('starter', 0)->where('slot', '<', 0)->orderBy('slot', 'DESC');
    }

    public function displayname(){
        return "$this->name $this->mascot";
    }
}
