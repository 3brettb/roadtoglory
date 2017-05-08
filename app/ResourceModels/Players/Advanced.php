<?php

namespace App\ResourceModels\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Advanced extends Model
{
    protected $connection = 'players';

    protected $table = 'advanced';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'carries', 'touches', 'receptions', 'targets', 'receptionpercentage', 'redzonetargets', 'redzonetouches', 'redzoneg2g',
    ];

    public function player(){
        return $this->belongsTo(Player::class);
    }

}
