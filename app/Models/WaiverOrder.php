<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaiverOrder extends Model
{
    protected $table = 'waiver_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'week_id', 'position',
    ];

    public function routeto(){
        return url("/week/$this->week_id/waiverorder");
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function week(){
        return $this->belongsTo(Week::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
