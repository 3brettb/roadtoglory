<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Trade extends Model
{
    protected $table = 'trades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'league_id', 'closes', 'accepted', 'approved', 'block'
    ];

    public static function boot(){
        static::creating(function($model){
            $model->block = (isset($model->block)) ? $model->block : false;
        });
    }

    public function routeto(){
        return url("/trade/$this->id");
    }
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'closes' => 'timestamp',
        'accepted' => 'boolean',
        'approved' => 'boolean',
    ];

    public function items(){
        $items = array();
        foreach($this->players as $player){
            array_push($items, $player);
        }
        foreach($this->picks as $pick){
            array_push($items, $pick);
        }
        return $items;
    }

    public function title(){
        $string = $this->owner->display('{N} {M}');
        foreach($this->teams as $team){
            if($team->id != $this->owner->id){
                $string .= " - ".$team->display('{N} {M}');
            }
        }
        return $string;
    }

    public function status(){
        if($this->approved == null){
            switch($this->accepted){
                case null:
                    return "Waiting";
                case false:
                    return "Rejected";
                case true:
                    return "Accepted";
            }
        }
        else{
            switch($this->approved){
                case false:
                    switch($this->accepted){
                        case null;
                        case true:
                            return "Rejected";
                        case false:
                            return "Vetoed";
                    }
                case true:
                    return (\Carbon\Carbon::now() > $this->closes) ? "Processed" : "Approved";
            }
        }
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'reference');
    }

    public function owner(){
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function picks(){
        return $this->morphedByMany(DraftPick::class, 'tradeable')->withPivot('accept', 'team_id');
    }

    public function teams(){
        return $this->morphedByMany(Team::class, 'tradeable')->withPivot('accept', 'team_id');
    }

    public function players(){
        return $this->morphedByMany(Player::class, 'tradeable')->withPivot('accept', 'team_id');
    }

    public function polls(){
        return $this->morphMany(Poll::class, 'reference');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
