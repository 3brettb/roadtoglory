<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MatchupTeam extends Model
{
    protected $table = 'matchup_teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matchup_id', 'team_id', 'score', 'win',
    ];

    public function routeto(){
        return $this->matchup->routeto();
    }
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'win' => 'boolean',
    ];

    public function matchup(){
        return $this->belongsTo(Matchup::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

}