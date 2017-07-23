<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class League extends Model
{
    protected $table = 'leagues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'season_id', 'user_id',
    ];

    public function routeto(){
        return url("/league/$this->id");
    }

    public function chat(){
        return Chat::where('league_id', $this->id)->where('type_id', 1)->first();
    }

    public function owner(){
        return $this->belongsTo(\App\User::class);
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function seasons(){
        return $this->hasMany(Season::class);
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function rules(){
        return $this->hasMany(Rule::class);
    }

    public function settings(){
        return $this->hasMany(Setting::class);
    }

    public function drafts(){
        return $this->hasMany(Draft::class);
    }

    public function league_activity(){
        return $this->hasMany(Activity::class);
    }

    public function trades(){
        return $this->hasMany(Trade::class);
    }

    public function alerts(){
        return $this->hasMany(Alert::class);
    }

    public function requests(){
        return $this->hasMany(\App\Models\Request::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function matchups(){
        return $this->hasMany(Matchup::class);
    }

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public function ir_eligibles(){
        return $this->hasManyThrough(IREligble::class, Player::class, 'league_id', 'player_id', 'id');
        // Try to extend the relation further?
        // return return $this->hasManyThrough(IREligble::class, Player::class, 'league_id', 'player_id', 'id')->hasOne(Player::class);
    }

    public function waivers(){
        return $this->hasManyThrough(Waiver::class, Team::class, 'league_id', 'team_id', 'id');
    }

    public function divisions(){
        return $this->hasManyThrough(Division::class, Season::class, 'league_id', 'season_id', 'id');
    }

    public function polls(){
        return $this->morphMany(Poll::class, 'reference');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
