<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DraftPick extends Model
{
    protected $table = 'draft_picks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'draft_id', 'team_id', 'round', 'number', 'overall', 'player_id', 'type_id', 'owner_id',
    ];

    public static function boot(){
        static::creating(function($model){
            $model->owner_id = (isset($model->owner_id)) ? $model->owner_id : $model->team_id;
        });
    }

    public function routeto(){
        return url("/draft/pick/$this->id");
    }

    public function toString(){
        return $this->team->display('{N} {M}')." #".$this->round." '".substr($this->draft->season->year, 2);
    }

    public function display($format){
        return \App\Managers\DraftPickManager::display($this, $format);
    }

    public function getTeamID(){
        return $this->team->id;
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\DraftPickType::class);
    }

    public function draft(){
        return $this->belongsTo(Draft::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function owner(){
        return $this->belongsTo(Team::class);
    }

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function trades(){
        return $this->morphToMany(Trade::class, 'tradeable')->withPivot('accept', 'team_id');
    }

}