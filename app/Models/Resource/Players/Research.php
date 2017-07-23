<?php

namespace App\Models\Resource\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Research extends Model
{
    protected $connection = 'players';

    protected $table = 'research';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'percentOwned', 'percentOwnedChange', 'percentStarted', 'percentStartedChange', 'depthChartOrder', 'numAdds', 'numDrops', 'player_id',
    ];

    public function player(){
        return $this->belongsTo(Player::class);
    }

}