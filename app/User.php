<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'password', 'status', 'active_team_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot(){
        static::creating(function($model){
            $model->status = "Offline";
        });
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function team(){
        return $this->hasOne(Team::class, 'id', 'active_team_id');
    }

    public function displayname(){
        return "$this->firstname $this->lastname";
    }
}
