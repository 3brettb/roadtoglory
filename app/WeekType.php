<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function weeks(){
        return $this->hasMany(Week::class);
    }
}