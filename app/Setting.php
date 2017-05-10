<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'name', 'description', 'value', 'data',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function data(){
        return ($this->data) ? json_decode($this->data) : null;
    }
}
