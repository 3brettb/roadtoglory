<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ResourceModels\Players\Player;

class RosterPlayer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'week_id', 'team_id', 'points',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function week(){
        return $this->belongsTo(Week::class);
    }

    public function fulldisplay(){
        return $this->player->fulldisplay();
    }

    public function status(){
        return $this->player->status();
    }

    public function playerid(){
        return $this->player->id;
    }
}