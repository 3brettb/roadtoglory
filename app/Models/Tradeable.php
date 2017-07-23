<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tradeable extends Model
{
    protected $table = 'trades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trade_id', 'tradeable_type', 'tradeable_id', 'accept', 'team_id',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'accept' => 'boolean',
    ];

    public function trade(){
        return $this->belongsTo(Trade::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

}