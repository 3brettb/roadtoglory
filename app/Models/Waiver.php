<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Waiver extends Model
{
    protected $table = 'waivers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'team_id', 'preferred_date', 'clear_date',
    ];

    public function routeto(){
        return $this->player->routeto();
    }

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function preferred(){
        return $this->belongsTo(Team::class);
    }

    public function claims(){
        return $this->belongsToMany(Team::class, 'waiver_claims', 'waiver_id', 'team_id');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}