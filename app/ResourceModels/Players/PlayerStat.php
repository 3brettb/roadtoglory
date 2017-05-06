<?php

namespace App\ResourceModels\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PlayerStat extends Model
{
    public $timestamps = false;

    protected $connection = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stat_id', 'player_id', 'stat_set_id'
    ];

    public static function statExists($player_id, $stat_id){
        return PlayerStat::where("player_id", $player_id)->where("stat_id", $stat_id)->first();
    }

}
