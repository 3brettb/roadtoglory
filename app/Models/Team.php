<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Team extends Model
{
    protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mascot', 'user_id', 'roster_id', 'league_id',
    ];

    public function routeto(){
        return url("/team/$this->id");
    }

    public function toString(){
        return "Team $this->id";
    }

    public function display($format){
        return \App\Managers\TeamManager::display($this, $format);
    }

    public function image(){
         //return ($this->image) ? \URL::asset($image->link) : \URL::asset("/img/users/default_user.jpg");
         return \URL::asset("/img/users/default_user.jpg");
    }

    public function getSelectNameAttribute(){
        return $this->name." ".$this->mascot."(".$this->owner->select_name.")";
    }

    public function record(){
        return $this->generateRecord();
    }

    public function owner(){
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    public function roster(){
        return $this->belongsTo(Roster::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function rosters(){
        return $this->hasMany(Roster::class);
    }

    public function players(){
        return $this->hasMany(Player::class);
    }

    public function picks(){
        return $this->hasMany(DraftPick::class, 'owner_id', 'id');
    }

    public function team_picks(){
        return $this->hasMany(DraftPick::class, 'team_id', 'id');
    }

    public function trades(){
        return $this->morphToMany(Trade::class, 'tradeable')->withPivot('accept', 'team_id');
    }

    public function rankings(){
        return $this->belongsToMany(Week::class, 'week_standings', 'team_id', 'week_id');
    }

    public function matchups(){
        return $this->belongsToMany(Matchup::class, 'matchup_teams', 'team_id', 'matchup_id');
    }

    public function ir_eligibles(){
        return $this->hasManyThrough(IREligble::class, Player::class, 'team_id', 'player_id', 'id');
    }

    public function to_waivers(){
        return $this->belongsToMany(Player::class, 'waivers', 'team_id', 'player_id');
    }

    public function waiver_orders(){
        return $this->hasMany(WaiverOrder::class);
    }

    public function claims(){
        return $this->belongsToMany(Waiver::class, 'waiver_claim', 'team_id', 'waiver_id');
    }

    public function divisions(){
        return $this->belongsToMany(Division::class, 'division_teams', 'team_id', 'division_id');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

    // ------------------------

    private function generateRecord(){
        $record = collect();
        $record->rank = 0;
        $record->played = 0;
        $record->wins = 0;
        $record->losses = 0;
        $record->ties = 0;
        $record->percent = 0;
        $record->points = collect();
        $record->points->for = 0;
        $record->points->against = 0;
        return $record;
    }

}
