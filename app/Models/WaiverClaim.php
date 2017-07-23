<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaiverClaim extends Model
{
    protected $table = 'waiver_claims';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'waiver_id', 'position',
    ];

    public function routeto(){
        return url("/waivers/$this->waiver_id/claims/$this->id");
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function waiver(){
        return $this->belongsTo(Waiver::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
