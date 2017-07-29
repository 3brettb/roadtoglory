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
            $model->league_id = league()->id;
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
    ];

    public function delete() {
        $this->picks()->detach();
        $this->players()->detach();
        $this->teams()->detach();
        parent::delete();
    }

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
            switch(strval($this->accepted))
            {
                case "1":
                    return "Accepted";
                case "0":
                    return "Rejected";
                case "":
                    return "Waiting";
            }
        }
        else{
            if($this->approved == 1){
                return (\Carbon\Carbon::now() > $this->closes) ? "Processed" : "Approved";
            }
            else {
                return (!$this->accepted == 0) ? "Vetoed" : "Rejected";
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
