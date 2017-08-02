<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Player extends Model
{
    protected $connection = 'roadtoglory';

    protected $table = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'player_data_id', 'team_id'
    ];

    public function routeto(){
        return url("/player/$this->id");
    }

    public function toString(){
        return "Player $this->id";
    }

    public function display($format){
        return \App\Managers\PlayerManager::display($this, $format);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function data(){
        return $this->belongsTo(\App\ResourceModels\Player\Player::class);
    }

    public function owner(){
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function weekstats(){
        return $this->hasMany(WeekStat::class);
    }

    public function picks(){
        return $this->hasMany(DraftPick::class);
    }

    public function trades(){
        return $this->morphToMany(Trade::class, 'tradeable')->withPivot('accept', 'team_id');
    }

    public function ir_eligible(){
        return $this->hasOne(IREligble::class);
    }

    public function waivers(){
        return $this->hasMany(Waiver::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
