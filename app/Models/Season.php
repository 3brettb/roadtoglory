<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Season extends Model
{
    protected $table = 'seasons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'year',
    ];

    public function routeto(){
        return url("/season/$this->id");
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function draft(){
        return $this->hasOne(Draft::class);
    }

    public function weeks(){
        return $this->hasMany(Week::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
