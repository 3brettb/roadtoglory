<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Stat extends Model
{
    protected $table = 'stats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'week_stat_id', 'type_id', 'value', 'points',
    ];

    public function routeto(){
        return $this->week->routeto();
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\StatType::class);
    }

    public function week(){
        return $this->belongsTo(WeekStat::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
