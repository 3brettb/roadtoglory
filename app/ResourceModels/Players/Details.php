<?php

namespace App\ResourceModels\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Details extends Model
{
    protected $connection = 'players';

    protected $table = 'details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'week', 'opponent', 'gameResult', 'gameDate', 'stats'
    ];

    public function player(){
        return $this->belongsTo(Player::class);
    }

}
