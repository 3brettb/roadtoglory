<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WeekStat extends Model
{
    protected $table = 'week_stats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'week_id',
    ];

    public function routeto(){
        return $this->player->routeto();
    }

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function week(){
        return $this->belongsTo(Week::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
