<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;

class DivisionTeam extends Pivot
{
    protected $table = 'division_teams';
    
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'division_id',
    ];

    public function routeto(){
        return $this->team->routeto();
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

}
