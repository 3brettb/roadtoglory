<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MatchupType extends Model
{
    protected $table = 'matchup_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function matchups(){
        return $this->hasMany(\App\Models\Matchup::class);
    }

}
