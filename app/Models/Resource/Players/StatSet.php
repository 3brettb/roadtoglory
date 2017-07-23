<?php

namespace App\Models\Resource\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StatSet extends Model
{
    public $timestamps = false;
    
    protected $connection = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'season_id'
    ];

}
