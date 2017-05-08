<?php

namespace App\ResourceModels\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Note extends Model
{
    public $timestamps = false;

    protected $connection = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timestamp', 'source', 'headline', 'body', 'analysis', 'player_id'
    ];

    public function player(){
        return $this->hasOne(Player::class);
    }

}
