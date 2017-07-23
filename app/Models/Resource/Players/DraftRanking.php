<?php

namespace App\Models\Resource\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DraftRanking extends Model
{
    protected $connection = 'players';

    protected $table = 'draft_rankings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'rank', 'auction', 'stock', 
    ];

    public function player(){
        return $this->belongsTo(Player::class);
    }

}
