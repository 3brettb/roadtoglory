<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class IREligble extends Model
{
    protected $table = 'ir_eligibles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'comments',
    ];

    public function routeto(){
        return $this->player->routeto();
    }

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}