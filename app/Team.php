<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mascot', 'user_id', 'league_id', 'picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }
}
