<?php

namespace App\ResourceModels\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Player extends Model
{
    protected $connection = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'esbid', 'gsisPlayerId', 'name', 'firstname', 'lastname', 'position', 'teamAbbr', 'injuryGameStatus', 'jerseyNumber'
    ];

}