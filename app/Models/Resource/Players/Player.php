<?php

namespace App\Models\Resource\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Player extends Model
{
    protected $connection = 'players';

    public $table = 'player';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'esbid', 'gsisPlayerId', 'name', 'firstname', 'lastname', 'position', 'teamAbbr', 'status', 'gamestatus', 'injuryGameStatus', 'jerseyNumber'
    ];

    public function display($format){
        $string = $format;
        $string = str_replace('{F}', $this->firstname, $string);
        $string = str_replace('{L}', $this->lastname, $string);
        $string = str_replace('{P}', $this->position, $string);
        $string = str_replace('{N}', $this->teamAbbr, $string);
        return $string;
    }

    public function toString()
    {
        return $this->display("{F} {L}, {P} {N}");
    }

    public function image(){
        return url("http://static.nfl.com/static/content/public/static/img/fantasy/transparent/200x200/$this->esbid.png");
    }

    public function profile(){
        return url("http://www.nfl.com/players/profile?id=$this->esbid");
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function research(){
        return $this->hasOne(Research::class);
    }

    public function advanced(){
        return $this->hasOne(Advanced::class);
    }

    public function details(){
        return $this->hasMany(Details::class);
    }

    public function draftranking(){
        return $this->hasOne(DraftRanking::class);
    }

    public function fulldisplay(){
        return "$this->firstname, $this->lastname, $this->position $this->teamAbbr";
    }

    public function displayname(){
        return "$this->firstname $this->lastname";
    }

    public function status(){
        return $this->status;
    }

    public function leagues(){
        return $this->belongsToMany(\App\Models\League::class, env('ROADTOGLORY_DATABASE').'.players', 'player_data_id', 'league_id')->withPivot(['team_id']);
    }

}
