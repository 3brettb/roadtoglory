<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StatType extends Model
{
    protected $table = 'stat_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'short'
    ];

    public function stats(){
        return $this->hasMany(\App\Models\Stat::class);
    }

}