<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ResourceModels\Player;

class IrEligible extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'league_id', 'notes',
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

    public function player(){
        return $this->hasOne(Player::class);
    }
}