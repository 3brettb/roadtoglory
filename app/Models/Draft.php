<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Draft extends Model
{
    protected $table = 'drafts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'season_id', 'rounds', 'keepers', 'date', 'type', 'completed',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'rounds' => 'integer',
        'completed' => 'boolean',
        'date' => 'datetime',
    ];


    public function routeto(){
        return url("/draft/$this->id");
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function picks(){
        return $this->hasMany(DraftPick::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}